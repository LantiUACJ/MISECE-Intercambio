<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use \App\Models\Hospital;
use \App\Models\Indice;
use \App\Models\HospitalIndice;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ApiController extends \App\Http\Controllers\Controller{

    /** 
     * Expediente Normal
     * Funcion encargada de adquirir los los expedientes del paciente 
     * Requiere CURP del paciente.
     */
    public function consultarExpedientes($curp, Request $request){
        $validator = Validator::make($request->all(), [
            "consultor"=>"required",
            "codigo"=>"nullable"
        ]);
        set_time_limit(180);

        if ($validator->fails()) {
            return $validator->errors();
        }
        $input = $validator->validated();
        $hospital_user = $request->headers->get("php-auth-user");

        return $this->expedientes($hospital_user, $curp, $input['consultor'], $input['codigo']);
    }
    public function expedientes($hospital_user, $curp, $consultor, $codigo){
        /* adquirir hospital */
        $hospital = Hospital::where("user",$hospital_user)->first();
        /* Verifica si existe el paciente */
        $indice = Indice::where(["curp"=>$curp])->first();
        if(!$indice){
            //dd("nada");
            return $this->pdf([]);
        }
        /* consultar al paciente de otro hospital */
        $hospitalesIndices = HospitalIndice::where("indice_id",$indice->id)->where("hospital_id","<>",$hospital->id)->get();
        $data = [];
        $log = "Hospital: ".$hospital_user. " Consultor: " . $consultor.  " paciente: ".$curp. " fecha: " . (new \Carbon\Carbon())->format("Y-m-d H-i-s") . " Respuestas: ";
        /* Verifica el código */
        if( !isset($codigo) || (isset($codigo) && $indice->codigo !== $codigo) || $indice->updated_at->diffInSeconds(\Carbon\Carbon::now()) > env("TIEMPO_VALIDACION")){
            return $this->sendCode($indice);
        }
        foreach($hospitalesIndices as $hospitalIndice){
            $tool = new \App\Tools\CurlHelper($hospitalIndice->hospital->url . "patient/", ["curp"=>$curp]);
            $bundle = $tool->get();
            if($bundle){
                //$log .= " (".$hospitalIndice->hospital->user.")";
                //$modulo_procesamiento = new \App\Tools\CurlHelper(env("MODULO_PROCESAMIENTO") . "procesarSNOMED/Bundle",$bundle);
                //$procesado = $modulo_procesamiento->postJson();
                //$data[] = ["bundle"=>$procesado?$procesado:$bundle,"hospital"=>$hospitalIndice->hospital];
                $data[] = ["bundle"=>$bundle,"hospital"=>$hospitalIndice->hospital];
            }
        }
        //$registroEventos = new \App\Tools\CurlHelper(env("MODULO_REGISTRO_EVENTOS"), ["msg"=>$log]);
        //$response = $registroEventos->noWaitPost();
        //return $this->most_actual($data);
        return $this->pdf($this->most_actual($data));
    }

    /* Expediente básico */
    public function consultarExpedientesBasico($curp, Request $request){
        $validator = Validator::make($request->all(), [
            "consultor"=>"required"
        ]);
        set_time_limit(180);

        if ($validator->fails()) {
            return $validator->errors();
        }
        $input = $validator->validated();
        $hospital_user = $request->headers->get("php-auth-user");

        return $this->expedientes($hospital_user, $curp, $input['consultor']);
    }

    public function expedientesBasico($hospital_user, $curp, $consultor, $codigo){
        /* adquirir hospital */
        $hospital = Hospital::where("user",$hospital_user)->first();
        /* Verifica si existe el paciente */
        $indice = Indice::where(["curp"=>$curp])->first();
        if(!$indice){
            return $this->pdf([]);
        }
        /* consultar al paciente de otro hospital */
        $hospitalesIndices = HospitalIndice::where("indice_id",$indice->id)->where("hospital_id","<>",$hospital->id)->get();
        $data = [];
        $log = "Hospital: ".$hospital_user. " Consultor: " . $consultor.  " paciente: ".$curp. " fecha: " . (new \Carbon\Carbon())->format("Y-m-d H-i-s") . " Respuestas: ";
        foreach($hospitalesIndices as $hospitalIndice){
            $tool = new \App\Tools\CurlHelper($hospitalIndice->hospital->url . "patient/basic/", ["curp"=>$curp]);
            $bundle = $tool->get();
            if($bundle){
                //$log .= " (".$hospitalIndice->hospital->user.")";
                //$modulo_procesamiento = new \App\Tools\CurlHelper(env("MODULO_PROCESAMIENTO") . "procesarSNOMED/Bundle",$bundle);
                //$procesado = $modulo_procesamiento->postJson();
                //$data[] = ["bundle"=>$procesado?$procesado:$bundle,"hospital"=>$hospitalIndice->hospital];
                $data[] = ["bundle"=>$bundle,"hospital"=>$hospitalIndice->hospital];
            }
        }
        //$registroEventos = new \App\Tools\CurlHelper(env("MODULO_REGISTRO_EVENTOS"), ["msg"=>$log]);
        //$response = $registroEventos->noWaitPost();
        //return $this->most_actual($data);
        return $this->pdf($this->most_actual($data));
    }

    /*
        Función que se encarga de generar el PDF
    */
    private function pdf($data){
        $start = round(microtime(true) * 1000);
        $txt = view("pdf",["data"=>$data]);
        if(isset($_GET["mode"]) && $_GET["mode"] == "HTML"){
            return $txt;
        }
        $name = "exptemp".$start;
        $myfile = fopen($name.".html", "w");
        $path = public_path()."\\".$name;
        fwrite($myfile, $txt);
        fclose($myfile);
        $command = $this->runCommand($name);
        if(file_exists("$name.pdf")){
            $myfile = fopen("$name.pdf", "r");
            $data = fread($myfile,filesize("$name.pdf"));
            fclose($myfile);
        }
        if(file_exists("$name.html")) unlink("$name.html");
        if(file_exists("$name.pdf")) unlink("$name.pdf");
        return response($data, 200)->header('Content-Type', 'application/pdf');
    }
    /*
    Función que llama al comando para generar el PDF.
    */
    private function runCommand($name){ //--disable-internal-links
        $command = "wkhtmltopdf toc --toc-header-text Índice -n  $name.html $name.pdf";
        shell_exec($command);
        return $command;
    }

    private function sendCode($indice){
        $codigo = rand(100000,999999);
        $indice->codigo = $codigo;
        $indice->save();
        //dd("Hola");
        Mail::to($indice->telefono)->send(new \App\Mail\Codigo($codigo));
        return response("El código es incorrecto, expiro o no fue enviado", 400);
    }

    private function most_actual($info){
        $index = 0;
        $actual = "";
        foreach($info as $key => $data){
            //dd($data);
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
}
