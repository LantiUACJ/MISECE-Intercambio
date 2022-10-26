<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tools\PetitionHelper;

class PacienteController extends Controller
{
    public function formulario(){
        return view("paciente.normal.form", ["codigo"=>false, "curp"=>""]);
    }
    public function consulta(Request $request){
        $input = $request->validate([
            "curp"=>"required",
            "codigo"=>"nullable",
        ]);

        $apiHelper = new \App\Tools\V1\ApiHelper([
            "curp"=>$input["curp"], 
            "hospital"=>auth()->user()->hospital, 
            "consultor"=>auth()->user()->name,
            "type"=>1,
            "codigo"=>isset($input["codigo"])?$input["codigo"]:"",
        ]);

        $apiHelper->searchPatient();
        if(!$apiHelper->isValid()){
            return view("paciente.normal.resultado", ["nombre"=>"ERROR", "data" => "no se encontró el paciente"]);
        }
        $nombre = $apiHelper->getIndice()->nombre;
        
        $apiHelper->validateCode();
        if(!$apiHelper->isValid()){
            return view("paciente.normal.codigo", ["nombre"=>$nombre, "curp"=>$input["curp"]]);
        }

        $apiHelper->getData();
        if(!$apiHelper->isValid()){
            return view("paciente.normal.resultado", ["nombre"=>$nombre, "data"=>"Sin respuesta"]);
        }
        return view("paciente.normal.resultado", ["nombre"=>$nombre, "data"=>$apiHelper->renderPartialHtml()]);
    }
    public function consultaPropia(Request $request){
        $input = $request->validate([
            "codigo"=>"nullable",
        ]);

        $apiHelper = new \App\Tools\V1\ApiHelper([
            "curp"=>auth()->user()->curp, 
            "hospital"=>auth()->user()->hospital, 
            "consultor"=>auth()->user()->name,
            "type"=>1,
            "codigo"=>isset($input["codigo"])?$input["codigo"]:"",
            "filtrarHospital"=>false
        ]);

        $apiHelper->searchPatient();
        if(!$apiHelper->isValid()){
            return view("paciente.propia.resultado", ["nombre"=>"ERROR", "data" => "no se encontró el paciente"]);
        }
        
        $apiHelper->validateCode();
        if(!$apiHelper->isValid()){
            return view("paciente.propia.codigo", ["nombre"=>auth()->user()->nombre, "curp"=>auth()->user()->curp]);
        }

        $apiHelper->getData();
        if(!$apiHelper->isValid()){
            return view("paciente.propia.resultado", ["nombre"=>auth()->user()->nombre, "data"=>"Sin respuesta"]);
        }
        return view("paciente.propia.resultado", ["nombre"=>auth()->user()->nombre, "data"=>$apiHelper->renderPartialHtml()]);
    }
}
