<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use \App\Models\Hospital;
use \App\Tools\PetitionHelper;
use Illuminate\Support\Facades\Validator;

class ApiController extends \App\Http\Controllers\Controller{

    public function consultarExpedientes($curp, Request $request){
        set_time_limit(180);
        $validator = Validator::make($request->all(), [
            "consultor"=>"required",
            "codigo"=>"nullable"
        ]);
        if ($validator->fails()) {
            return response($validator->errors(),400);
        }
        $input = $validator->validated();
        $hospital_user = $request->headers->get("php-auth-user");
        /* adquirir hospital */
        $hospital = Hospital::where("user",$hospital_user)->first();

        $ph = new PetitionHelper($curp, $hospital, $input["consultor"], 1);
        
        if(!$ph->searchPatient()){
            return response(["Error"=>"no se encontró el paciente"], 404);
        }
        if(!$ph->validateCode(isset($input["codigo"])?$input["codigo"]:"")){
            $ph->sendCode();
            return response(["Error"=>"El código de verificación no es correcto o expiro"], 400);
        }

        $ph->getData();

        return $ph->renderHtml();
    }

    public function consultarExpedientesBasico($curp, Request $request){
        set_time_limit(180);
        $validator = Validator::make($request->all(), [
            "consultor"=>"required"
        ]);
        if ($validator->fails()) {
            return response($validator->errors(),400);
        }
        $input = $validator->validated();
        $hospital_user = $request->headers->get("php-auth-user");
        /* adquirir hospital */
        $hospital = Hospital::where("user",$hospital_user)->first();

        $ph = new PetitionHelper($curp, $hospital, $input["consultor"], 2);
        
        if(!$ph->searchPatient()){
            return response(["Error"=>"no se encontró el paciente"], 404);
        }

        $ph->getData();

        return $ph->renderHtml();
    }
}
