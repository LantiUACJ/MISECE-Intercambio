<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use \App\Models\Hospital;
use App\Models\Log;
use \App\Tools\PetitionHelper;
use \App\Tools\LogChain;
use Illuminate\Support\Facades\Validator;

class ApiController extends \App\Http\Controllers\Controller{

    public function consultarExpedientes($curp, Request $request){
        set_time_limit(180);
        $validator = Validator::make($request->all(), [
            "consultor"=>"required",
            "codigo"=>"nullable"
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
            //return $validator->errors();
        }
        $input = $validator->validated();
        $hospital_user = $request->headers->get("php-auth-user");
        /* adquirir hospital */
        $hospital = Hospital::where("user",$hospital_user)->first();

        $ph = new PetitionHelper($curp, $hospital, $input["consultor"], 1);
        
        if(!$ph->searchPatient()){
            return ["Error"=>"no se encontró el paciente"];
        }
        if(!$ph->validateCode(isset($input["codigo"])?$input["codigo"]:"")){
            $ph->sendCode();
            return ["Error"=>"Código inválido"];
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
            return $validator->errors();
        }
        $input = $validator->validated();
        $hospital_user = $request->headers->get("php-auth-user");
        /* adquirir hospital */
        $hospital = Hospital::where("user",$hospital_user)->first();

        $ph = new PetitionHelper($curp, $hospital, $input["consultor"], 2);
        
        if(!$ph->searchPatient()){
            return ["Error"=>"no se encontró el paciente"];
        }

        $ph->getData();

        return $ph->renderHtml();
    }
}
