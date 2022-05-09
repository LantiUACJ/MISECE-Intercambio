<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tools\PetitionHelper;

class PacienteBasicoController extends Controller
{
    public function formulario(){
        return view("paciente.basico");
    }
    public function consulta(Request $request){
        $input = $request->validate([
            "curp"=>"required",
        ]);

        $ph = new PetitionHelper($input['curp'], auth()->user()->hospital, auth()->user()->name, 2);
        
        if(!$ph->searchPatient()){
            return view("paciente.resultado", ["data"=>$data, "nombre"=>"", $data => "no se encontró el paciente"]);
        }
        $nombre = $ph->indice->nombre;

        $ph->getData();

        return view("paciente.resultado", ["nombre"=>$nombre, "data"=>$ph->renderPartialHtml()]);
    }
}
