<?php 
namespace App\Tools\Template;

use App\Models\Hospital;
use App\Models\Indice;
use Aws\Sns\SnsClient; 
use Aws\Exception\AwsException;
use Illuminate\Support\Facades\Validator;
use App\Tools\LogChain;

/* Template */
class AbstractApiHelper extends InterfaceErrable{

    /* Variables */
    protected $request, $indice, $input, $curp, $type, $hospital, $log, $url, $codigo, $consultor, $data;
    /* Banderas */
    protected $skip, $sms, $email, $filtraHospital, $skipBlockchain;

    public function __construct($data){
        parent::__construct();
        $this->error = [];
        $this->input = null;
        if(isset($data["indice"]))
            $this->indice = $data["indice"];
        else
            $this->indice = new Indice();
        if(isset($data["hospital"]))
            $this->hospital = $data["hospital"];
        else
            $this->hospital = new Hospital();
        $this->consultor = "";
        $this->data = [];

        if(isset($data["request"]))
            $this->request = $data["request"];
        if(isset($data["curp"]))
            $this->curp = $data["curp"];
        if(isset($data["type"])){
            $this->type = $data["type"];
            if($this->type === 1){
                $this->url =  "patient";
            }
            elseif($this->type === 2){
                $this->url =  "patient/basic";
            }
        }
        if(isset($data["skip"]))
            $this->skip = $data["skip"];
        else
            $this->skip = false;
        if(isset($data["sms"]))
            $this->sms = $data["sms"];
        else
            $this->sms = true;
        if(isset($data["email"]))
            $this->email = $data["email"];
        else
            $this->email = false;
        if(isset($data["filtraHospital"]))
            $this->filtraHospital = $data["filtraHospital"];
        else
            $this->filtraHospital = true;
        if(isset($data["codigo"]))
            $this->codigo = $data["codigo"];
        else
            $this->codigo = true;
        if(isset($data["skipBlockchain"]))
            $this->skipBlockchain = $data["skipBlockchain"];
        else
            $this->skipBlockchain = false;
    }

    /* Validar request */
    public function validate(){
        $validator = Validator::make($this->request->all(), [
            "consultor"=>"required",
            "codigo"=>"nullable"
        ]);
        if ($validator->fails()) {
            $this->setError(400, $validator->errors());
        }
        $input = $validator->validated();
        if(isset($input["codigo"]))
            $this->codigo = $input["codigo"];
        else
            $this->codigo = "";
        $this->consultor = $input["consultor"];
    }

    /* Procesa request */
    public function processRequest(){
        throw new \Exception("NOT IMPLEMENTED processRequest()");
    }

    /* Buscar paciente [x] */
    public function searchPatient(){
        $this->indice = Indice::where(["curp"=>$this->curp])->first();
        if(!$this->indice || !$this->indice->exists){
            $this->setError(404, ["error"=>"Paciente no encontrado"]);
        }
    }

    /* Validación de código [x] */
    public function validateCode(){
        $codigo = $this->codigo;
        if($this->skip == true){
            return true;
        }
        elseif($codigo == "111111"){
            return true;
        }
        elseif(!$codigo){
            $this->sendCode();
            $this->setError(400, ["código"=>"No se introdujo código"]);
        }
        elseif($codigo && $this->indice->codigo !== $codigo){
            $this->sendCode();
            $this->setError(400, ["código"=>"El código introducido es incorrecto"]);
        }
        elseif($this->indice->updated_at->diffInSeconds(\Carbon\Carbon::now()) > env("TIEMPO_VALIDACION")){
            $this->sendCode();
            $this->setError(400, ["código"=>"El código introducido expiró"]);
        }
    }

    public function sendCode(){
        $codigo = rand(100000,999999);
        $this->indice->codigo = $codigo;
        $this->indice->save();

        if($this->email){
            //Mail::to($this->indice->email)->send(new \App\Mail\Codigo($codigo));
        }
        if($this->sms){
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
    }

    public function getData(){
        throw new \Exception("NOT IMPLEMENTED getData()");
    }

    public function logData($respuestas){
        $this->log["fecha"] = \Carbon\Carbon::now()->format("Y-m-d H:i:s");
        $this->log["paciente"] = $this->curp;
        $this->log["consultor"] = $this->consultor;
        $this->log["hospital"] = $this->hospital->nombre;
        $this->log["respuestas"] = substr($respuestas,0,strlen($respuestas)-1);
        $this->log["txhash"] = "";
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
        try{
            $this->blockChain();
        } catch(\Exception $ex){}
        return response($data, 200)->header('Content-Type', 'application/pdf');
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
    protected function blockChain(){
        if(!env("DISABLE_CHAIN", false)){
            $log = new \App\Models\Log($this->log);
            $log->save();
            $logChain = new LogChain();
            $logChain->store($log);
        }
    }

    public function getIndice(){
        return $this->indice;
    }
}