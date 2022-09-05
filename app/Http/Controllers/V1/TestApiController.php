<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use \App\Models\Hospital;
use \App\Tools\PetitionHelper;
use Illuminate\Support\Facades\Validator;

class TestApiController extends \App\Http\Controllers\Controller{

    public function consultarExpedientes($curp, Request $request){
        $validator = Validator::make($request->all(), [
            "consultor"=>"required",
            "numero"=>"required",
            "codigo"=>"nullable",
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $input = $validator->validated();
        //$hospital_user = $request->headers->get("php-auth-user");
        /* adquirir hospital */
        
        $ph = new PetitionHelper($curp, null, $input["consultor"], 1);
        
        if(!$ph->fakePatient($input["numero"])){
            return ["Error"=>"no se encontró el paciente"];
        }
        
        if(!$ph->fakeValidate(isset($input["codigo"])?$input["codigo"]:"")){
            $ph->fakeCode();
            return ["Error"=>"Código inválido"];
        }

        $ph->fakeData();

        return $ph->renderHtml();
    }
    public function consultarExpedientesBasico($curp, Request $request){
        $validator = Validator::make($request->all(), [
            "consultor"=>"required",
            "codigo"=>"nullable",
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        }
        $input = $validator->validated();
        
        $ph = new PetitionHelper($curp, null, $input["consultor"], 1);
        
        if(!$ph->fakePatient("meh")){
            return ["Error"=>"no se encontró el paciente"];
        }

        $ph->fakeData();

        return $ph->renderHtml();
    }
    public function testJson(Request $request){
        $inicio = microtime(true);
        $hospital_user = $request->headers->get("php-auth-user");
        $hospital = Hospital::where("user",$hospital_user)->first();

        $jsontxt = $request->input("json", false);
        $data = [];
        if($jsontxt)
            $data[] = ["bundle"=>new \App\Fhir\Resource\Bundle($jsontxt),"hospital"=>$hospital];
        return view("pdf",["data"=>$data]);
    }
}
