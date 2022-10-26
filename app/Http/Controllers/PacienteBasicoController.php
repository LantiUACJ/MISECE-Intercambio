<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PacienteBasicoController extends Controller
{
    public function formulario(){
        return view("paciente.basica.form");
    }
    public function consulta(Request $request){
        $input = $request->validate([
            "curp"=>"required",
        ]);

        $apiHelper = new \App\Tools\V1\ApiHelper([
            "curp"=>$input["curp"], 
            "hospital"=>auth()->user()->hospital, 
            "consultor"=>auth()->user()->name,
            "type"=>2,
        ]);

        $apiHelper->searchPatient();
        if(!$apiHelper->isValid()){
            return view("paciente.basica.resultado", ["nombre"=>"ERROR", "data" => "no se encontró el paciente"]);
        }
        $nombre = $apiHelper->getIndice()->nombre;

        $apiHelper->getData();
        if(!$apiHelper->isValid()){
            return view("paciente.basica.resultado", ["nombre"=>$nombre, "data"=>"Sin respuesta"]);
        }
        return view("paciente.basica.resultado", ["nombre"=>$nombre, "data"=>$apiHelper->renderPartialHtml()]);
    }
}
