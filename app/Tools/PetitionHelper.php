<?php 
namespace App\Tools;

use \App\Models\Hospital;
use \App\Models\Indice;
use \App\Models\HospitalIndice;

use Aws\Sns\SnsClient; 
use Aws\Exception\AwsException;

use Illuminate\Support\Facades\Mail;

class PetitionHelper{

    public function __construct($curp, $hospital, $consultor, $type){
        $this->curp = $curp;
        $this->indice = null;
        $this->hospital = $hospital;
        $this->consultor = $consultor;
        $this->data = [];
        $this->log = ["respuestas"=>""];
        $this->skip = false;
        if($type === 1){
            $this->url =  "patient/";
        }
        elseif($type === 2){
            $this->url =  "patient/basic";
        }
    }

    public function searchPatient(){
        $this->indice = Indice::where(["curp"=>$this->curp])->first();
        return $this->indice?true:false;
    }

    public function getHospitalIndice(){
        return HospitalIndice::where("indice_id",$this->indice->id)->where("hospital_id","<>",$this->hospital->id)->get();
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
        Mail::to($this->indice->email)->send(new \App\Mail\Codigo($codigo));
        return true;
        $credentials = new \Aws\Credentials\Credentials(env("AWS_ACCESS_KEY_ID"),env("AWS_SECRET_ACCESS_KEY"));
        $credentialsProv = \Aws\Credentials\CredentialProvider::fromCredentials($credentials);

        $SnSclient = new SnsClient([
            'version'     => 'latest',
            'region'      => 'us-east-1',
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
        $path = public_path()."\\".$name;
        fwrite($myfile, $txt);
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
            $tool = new \App\Tools\CurlHelper($hospitalIndice->hospital->url . $this->url, ["curp"=>$this->curp]);
            $bundle = $tool->get();
            if($bundle){
                $this->log["respuestas"] .= $hospitalIndice->hospital->user;
                if(env("MODULO_PROCESAMIENTO", "ignore") != "ignore"){
                    $modulo_procesamiento = new \App\Tools\CurlHelper(env("MODULO_PROCESAMIENTO") . "procesarSNOMED/Bundle",$bundle);
                    $procesado = $modulo_procesamiento->postJson();
                    $this->data[] = ["bundle"=>$procesado?$procesado:$bundle,"hospital"=>$hospitalIndice->hospital];
                }
                else{
                    $this->data[] = ["bundle"=>$bundle,"hospital"=>$hospitalIndice->hospital];
                }
            }
        }
    }
    
    public function renderPartialHtml(){
        return view("_pdf",["data"=>$this->data]);
    }

    public function renderHtml(){
        return view("pdf",["data"=>$this->data]);
    }

    public function mostActual(){
        $index = 0;
        $actual = "";
        $info = $this->data;
        foreach($info as $key => $data){
            foreach($data["bundle"]->entry as $entry){
                if($entry->resource->resourceType == "Encounter"){
                    $end = new \Carbon\Carbon($entry->resource->period->end);
                    if(!$actual){
                        $actual = $end;
                        $index = $key;
                    }
                    elseif($actual->lt($end)){
                        $actual = $end;
                        $index = $key;
                    }
                }
            }
        }
        $first = $info[0];
        $info[0] = $info[$index];
        $info[$index] = $first;
        return $info;
    }

    //$registroEventos = new \App\Tools\CurlHelper(env("MODULO_REGISTRO_EVENTOS"), ["msg"=>$log]);
    //$response = $registroEventos->noWaitPost();
}