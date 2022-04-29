<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PacienteController extends Controller
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

        $codigo = isset($input["codigo"])?$input["codigo"]:"";
        
        $data = $apiController->expedientes(auth()->user()->hospital->user, $input["curp"], auth()->user()->name, $codigo);
        
        if($data && $data instanceof \Illuminate\View\View){
            return view("paciente.formulario", ["codigo"=>isset($input["codigo"])?$input["codigo"]:true, "curp"=>$input["curp"], "data"=>$data]);
        }
        elseif ($data && $data instanceof \Illuminate\Http\Response && $data->status() == 200){
            return view("paciente.formulario", ["codigo"=>isset($input["codigo"])?$input["codigo"]:true, "curp"=>$input["curp"], "data"=>$data]);
        }
        else
            return view("paciente.formulario", ["codigo"=>isset($input["codigo"])?$input["codigo"]:true, "curp"=>$input["curp"]]);
    }

    public function consultaPropia(Request $request){
        $input = [
            "curp"=>"VIRV19930327MOCLQG93X",
        ];
        $_GET["mode"] = "HTML";
        $apiController = new V1\ApiController();

        $codigo = isset($input["codigo"])?$input["codigo"]:"SKIP";
        
        $data = $apiController->expedientes(auth()->user()->hospital->user, $input["curp"], auth()->user()->name, $codigo);
        
        if($data && $data instanceof \Illuminate\View\View){
            return view("paciente.formulario", ["codigo"=>isset($input["codigo"])?$input["codigo"]:false, "curp"=>$input["curp"], "data"=>$data]);
        }
        elseif ($data && $data instanceof \Illuminate\Http\Response && $data->status() == 200){
            return view("paciente.formulario", ["codigo"=>isset($input["codigo"])?$input["codigo"]:false, "curp"=>$input["curp"], "data"=>$data]);
        }
        else
            return view("paciente.formulario", ["codigo"=>isset($input["codigo"])?$input["codigo"]:false, "curp"=>$input["curp"]]);
    }
}
