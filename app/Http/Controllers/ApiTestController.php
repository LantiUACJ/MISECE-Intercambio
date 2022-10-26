<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use \App\Models\Hospital;
use \App\Tools\Test\ApiHelper;
use Illuminate\Support\Facades\Validator;

class ApiTestController extends \App\Http\Controllers\Controller{

    public function consultarExpedientes($curp, Request $request){
        $validator = Validator::make($request->all(), [
            "consultor"=>"required",
            "codigo"=>"nullable",
        ]);
        if ($validator->fails()) {
            return response($validator->errors(),400);
        }
        $input = $validator->validated();
        
        $ph = new ApiHelper([
            "curp"=>$curp, 
            "codigo"=>isset($input["codigo"])?$input["codigo"]:"", 
            "consultor"=>$input["consultor"], 
            "type"=>1,
            "skipBlockchain"=>true
        ]);
        
        if(!$ph->searchPatient()){
            return response(["Error"=>"no se encontró el paciente"], 404);
        }
        
        if(!$ph->validateCode()){
            return response(["Error"=>"El código de verificación no es correcto o expiro"], 400);
        }

        $ph->getData();

        return $ph->renderHtml();
    }
    public function consultarExpedientesBasico($curp, Request $request){
        $validator = Validator::make($request->all(), [
            "consultor"=>"required",
            "codigo"=>"nullable",
        ]);
        if ($validator->fails()) {
            return response($validator->errors(),400);
        }
        $input = $validator->validated();
        
        $ph = new ApiHelper([
            "curp"=>$curp, 
            "codigo"=>isset($input["codigo"])?$input["codigo"]:"",
            "consultor"=>$input["consultor"],
            "type"=>1,
            "skipBlockchain"=>true
        ]);
        
        if(!$ph->searchPatient()){
            return response(["Error"=>"no se encontró el paciente"], 404);
        }
        
        if(!$ph->validateCode()){
            return response(["Error"=>"El código de verificación no es correcto o expiro"], 400);
        }

        $ph->getData();

        return $ph->renderHtml();
    }
    public function testJson(Request $request, $version){
        $inicio = microtime(true);
        $hospital_user = "";
        if($version == "v1")
            $hospital_user = $request->headers->get("php-auth-user");
        if($version == "v2"){
            $jwt = str_replace("Bearer ", "", $request->header('authorization'));
            $header = json_decode(base64_decode(explode('.',$jwt)[0]));
            $cert = openssl_x509_read($header->cert);
            $hospital_user = openssl_x509_parse($cert)["subject"]["CN"];
        }

        $hospital = Hospital::where("user",$hospital_user)->first();

        $jsontxt = $request->input("json", false);
        $data = [];
        if($jsontxt)
            $data[] = ["bundle"=>new \App\Fhir\Resource\Bundle($jsontxt),"hospital"=>$hospital];
        return view("pdf",["data"=>$data]);
    }
}
