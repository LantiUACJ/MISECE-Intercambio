<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PacienteBasicoController extends Controller
{
    public function formulario(){
        return view("paciente.formulario", ["codigo"=>false, "curp"=>""]);
    }
    public function consulta(Request $request){
        $input = $request->validate([
            "curp"=>"required",
            "codigo"=>"nullable",
        ]);
        $_GET["mode"] = "HTML";
        $apiController = new V1\ApiController();

        //$codigo = isset($input["codigo"])?$input["codigo"]:"";
        
        $data = $apiController->expedientesBasico(auth()->user()->hospital->user, $input["curp"], auth()->user()->name);
        if($data && $data instanceof \Illuminate\View\View){
            return view("paciente.formulario", ["codigo"=>false, "curp"=>$input["curp"], "data"=>$data]);
        }
        elseif ($data && $data instanceof \Illuminate\Http\Response && $data->status() == 200){
            return view("paciente.formulario", ["codigo"=>false, "curp"=>$input["curp"], "data"=>$data]);
        }
        else
            return view("paciente.formulario", ["codigo"=>false, "curp"=>$input["curp"]]);
    }
}
