<?php 
namespace App\Tools;

use App\Models\Hospital;
use \App\Models\Indice;
use \App\Models\HospitalIndice;

use Aws\Sns\SnsClient; 
use Aws\Exception\AwsException;

class PetitionHelper{

    public function __construct($curp, $hospital, $consultor, $type){
        $this->curp = $curp;
        $this->indice = null;
        $this->hospital = $hospital;
        $this->consultor = $consultor;
        $this->data = [];
        $this->log = ["respuestas"=>""];
        $this->skip = true;
        if($type === 1){
            $this->url =  "patient/";
        }
        elseif($type === 2){
            $this->url =  "patient/basic";
        }
        $this->filtraHospital = true;
    }

    public function searchPatient(){
        $this->indice = Indice::where(["curp"=>$this->curp])->first();
        return $this->indice?true:false;
    }

    public function getHospitalIndice(){
        $query = HospitalIndice::where("indice_id",$this->indice->id);
        if($this->filtraHospital)
            $query->where("hospital_id","<>",$this->hospital->id)->get();
        return $query->get();
    }

    public function filtrarHospital($filtrar){
        $this->filtraHospital = $filtrar;
    }

    public function validateCode($codigo){
        if($this->skip == true)
            return true;
        if(!isset($codigo))
            return false;
        if(isset($codigo) && $this->indice->codigo !== $codigo)
            return false;
        if($this->indice->updated_at->diffInSeconds(\Carbon\Carbon::now()) > env("TIEMPO_VALIDACION"))
            return false;
        return true;
    }

    public function sendCode(){
        $codigo = rand(100000,999999);
        $this->indice->codigo = $codigo;
        $this->indice->save();
        /*Mail::to($this->indice->email)->send(new \App\Mail\Codigo($codigo));
        return true;
        */
        $credentials = new \Aws\Credentials\Credentials(env("AWS_ACCESS_KEY_ID"),env("AWS_SECRET_ACCESS_KEY"));
        $credentialsProv = \Aws\Credentials\CredentialProvider::fromCredentials($credentials);

        $SnSclient = new SnsClient([
            'version'     => 'latest',
            'region'      => env("AWS_DEFAULT_REGION"),
            'credentials' => $credentialsProv,
        ]);
        
        try {
            $result = $SnSclient->publish([
                'Message' => "Código para autorizar el acceso a su expediente clínico electrónico: " . $codigo,
                'PhoneNumber' => $this->indice->telefono,
                "MessageAttributes" => [
                    'AWS.SNS.SMS.SMSType' => [
                        'DataType' => 'String',
                        'StringValue' => 'Transactional'
                    ]
                ],
            ]);
        } 
        catch (AwsException $e) {
            error_log($e->getMessage());
        }
    }

    public function renderPdf(){
        $start = round(microtime(true) * 1000);
        $txt = $this->renderHtml();
        $name = "exptemp".$start;
        $myfile = fopen($name.".html", "w");
        //$path = public_path()."\\".$name;
        fwrite($myfile, $txt->render());
        fclose($myfile);
        //--disable-internal-links
        $command = "wkhtmltopdf toc --toc-header-text Índice -n  $name.html $name.pdf";
        shell_exec($command);
        if(file_exists("$name.pdf")){
            $myfile = fopen("$name.pdf", "r");
            $data = fread($myfile,filesize("$name.pdf"));
            fclose($myfile);
        }
        if(file_exists("$name.html")) unlink("$name.html");
        if(file_exists("$name.pdf")) unlink("$name.pdf");
        return response($data, 200)->header('Content-Type', 'application/pdf');
    }

    public function getData(){
        foreach($this->getHospitalIndice() as $hospitalIndice){
            $curlConsulta = new \App\Tools\CurlHelper($hospitalIndice->hospital->url . $this->url, ["curp"=>$this->curp]);
            $bundle = $curlConsulta->get();
            if($curlConsulta->success() == 200){
                $data = [];
                $this->log["respuestas"] .= $hospitalIndice->hospital->user . ",";
                if(env("MODULO_PROCESAMIENTO", "ignore") != "ignore"){
                    $curlProcesamiento = new \App\Tools\CurlHelper(env("MODULO_PROCESAMIENTO") . "procesarSNOMED/Bundle",$bundle);
                    $procesado = $curlProcesamiento->postJson();
                    if($curlProcesamiento->success() == 200) $data = new \App\Fhir\Resource\Bundle($procesado);
                }
                if(!$data) $data = new \App\Fhir\Resource\Bundle($bundle);

                $this->data[] = ["bundle"=>$data,"hospital"=>$hospitalIndice->hospital];
            }
        }
        $this->log["fecha"] = \Carbon\Carbon::now()->format("Y-m-d H:i:s");
        $this->log["paciente"] = $this->curp;
        $this->log["consultor"] = $this->consultor;
        $this->log["hospital"] = $this->hospital->nombre;
        $this->log["respuestas"] = substr($this->log["respuestas"],0,strlen($this->log["respuestas"])-1);
        $this->log["txhash"] = "";
        $data = new \App\Tools\JsonProcessHelper($this->data);
        $this->data = $data->sortDesc();
    }
    
    public function renderPartialHtml(){
        try{
            $this->blockChain();
        } catch(\Exception $ex){}
        return view("_pdf",["data"=>$this->data]);
    }

    public function renderHtml(){
        try{
            $this->blockChain();
        } catch(\Exception $ex){}
        return view("pdf",["data"=>$this->data]);
    }

    private function blockChain(){
        if(!env("DISABLE_CHAIN", false)){
            $log = new \App\Models\Log($this->log);
            $log->save();
            $logChain = new LogChain();
            $logChain->store($log);
        }
    }

    /* Para pruebas */
    public function fakePatient($number){
        if($this->curp == "error"){
            return false;
        }
        $this->indice = new Indice();
        $this->indice->curp = $this->curp;
        $this->indice->telefono = $number;
        return $this->indice?true:false;
    }
    public function fakeData(){
        $archivoJson = fopen("json_pruebas/bundle.json", "r");
        $jsonTxt = fread($archivoJson,filesize("json_pruebas/bundle.json"));
        $hospital = new Hospital(["nombre"=>"instituto/hospital de prueba"]);
        $this->data[] = ["bundle"=>new \App\Fhir\Resource\Bundle($jsonTxt),"hospital"=>$hospital];
        //$data = new \App\Tools\JsonProcessHelper($this->data);
        //$this->data = $data->sortDesc();
    }
    public function fakeCode(){
        $codigo = rand(100000,999999);
        $credentials = new \Aws\Credentials\Credentials(env("AWS_ACCESS_KEY_ID"),env("AWS_SECRET_ACCESS_KEY"));
        $credentialsProv = \Aws\Credentials\CredentialProvider::fromCredentials($credentials);
        $SnSclient = new SnsClient([
            'version'     => 'latest',
            'region'      => env("AWS_DEFAULT_REGION"),
            'credentials' => $credentialsProv,
        ]);
        
        try {
            $result = $SnSclient->publish([
                'Message' => "Código para autorizar el acceso a su expediente clínico electrónico: " . $codigo,
                'PhoneNumber' => $this->indice->telefono,
                "MessageAttributes" => [
                    'AWS.SNS.SMS.SMSType' => [
                        'DataType' => 'String',
                        'StringValue' => 'Transactional'
                    ]
                ],
            ]);
        } 
        catch (AwsException $e) {
            error_log($e->getMessage());
        }
    }
    public function fakeValidate($codigo){
        if($codigo)
            return true;
        else
            return false;
    }
}