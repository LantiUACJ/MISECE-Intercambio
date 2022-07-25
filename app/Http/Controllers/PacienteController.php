<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tools\PetitionHelper;

class PacienteController extends Controller
{
    public function formulario(){
        return view("paciente.normal_curp", ["codigo"=>false, "curp"=>""]);
    }
    public function consulta(Request $request){
        $input = $request->validate([
            "curp"=>"required",
            "codigo"=>"nullable",
        ]);

        $ph = new PetitionHelper($input['curp'], auth()->user()->hospital, auth()->user()->name, 1);
        
        if(!$ph->searchPatient()){
            return view("paciente.resultado", ["nombre"=>"ERROR", "data" => "no se encontró el paciente"]);
        }
        $nombre = $ph->indice->nombre;
        
        if(!$ph->validateCode(isset($input["codigo"])?$input["codigo"]:"")){
            $ph->sendCode();
            return view("paciente.normal_codigo", ["nombre"=>$nombre, "curp"=>$input["curp"]]);
        }

        $ph->getData();

        return view("paciente.resultado", ["nombre"=>$nombre, "data"=>$ph->renderPartialHtml()]);
    }

    public function consultaPropia(Request $request){
        $ph = new PetitionHelper(auth()->user()->curp, auth()->user()->hospital, auth()->user()->name, 1);
        
        $input = $request->validate([
            "codigo"=>"nullable",
        ]);
        
        if(!$ph->searchPatient()){
            return view("paciente.resultado", ["nombre"=>"", "data"=>"no se encontró el paciente"]);
        }
        $nombre = $ph->indice->nombre;
        if(!$ph->validateCode(isset($input["codigo"])?$input["codigo"]:"")){
            $ph->sendCode();
            return view("paciente.normal_codigo", ["nombre"=>$nombre, "curp"=>auth()->user()->curp]);
        }

        $ph->getData();

        return view("paciente.resultado", ["nombre"=>$nombre, "data"=>$ph->renderPartialHtml()]);
    }
}
