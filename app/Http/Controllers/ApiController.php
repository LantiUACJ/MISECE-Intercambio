<?php

namespace App\Http\Controllers;

use App\Models\Repositorio;
use Illuminate\Http\Request;

class ApiController extends \App\Http\Controllers\Controller{

    public function consultarExpedientes($version, $curp, Request $request){
        set_time_limit(180);
        $apiHelper = null;
        if($version == "v1")
            $apiHelper = new \App\Tools\V1\ApiHelper(["request"=>$request, "curp"=>$curp, "type"=>1]);
        elseif($version == "v2")
            $apiHelper = new \App\Tools\V2\ApiHelper(["request"=>$request, "curp"=>$curp, "type"=>1]);
        $apiHelper->validate();
        if(!$apiHelper->isValid()){
            return response($apiHelper->getErrorMessage(),$apiHelper->getErrorCode());
        }
        $apiHelper->processRequest();
        if(!$apiHelper->isValid()){
            return response($apiHelper->getErrorMessage(),$apiHelper->getErrorCode());
        }
        $apiHelper->searchPatient();
        if(!$apiHelper->isValid()){
            return response($apiHelper->getErrorMessage(),$apiHelper->getErrorCode());
        }
        $apiHelper->validateCode();
        if(!$apiHelper->isValid()){
            return response($apiHelper->getErrorMessage(),$apiHelper->getErrorCode());
        }
        $apiHelper->getData();
        if(!$apiHelper->isValid()){
            return response($apiHelper->getErrorMessage(),$apiHelper->getErrorCode());
        }
        return $apiHelper->renderHtml();
    }

    public function consultarExpedientesBasico($version, $curp, Request $request){
        set_time_limit(180);
        $apiHelper = null;
        if($version == "v1")
            $apiHelper = new \App\Tools\V1\ApiHelper(["request"=>$request, "curp"=>$curp, "type"=>2]);
        elseif($version == "v2")
            $apiHelper = new \App\Tools\V2\ApiHelper(["request"=>$request, "curp"=>$curp, "type"=>2]);
        $apiHelper->validate();
        if(!$apiHelper->isValid()){
            return response($apiHelper->getErrorMessage(),$apiHelper->getErrorCode());
        }
        $apiHelper->processRequest();
        if(!$apiHelper->isValid()){
            return response($apiHelper->getErrorMessage(),$apiHelper->getErrorCode());
        }
        $apiHelper->searchPatient();
        if(!$apiHelper->isValid()){
            return response($apiHelper->getErrorMessage(),$apiHelper->getErrorCode());
        }
        $apiHelper->getData();
        if(!$apiHelper->isValid()){
            return response($apiHelper->getErrorMessage(),$apiHelper->getErrorCode());
        }

        return $apiHelper->renderHtml();
    }

    public function repositorio(){
        $repo = new Repositorio();
        $repo->activa = true;
        return ["status"=>$repo->save()?$repo:false];
    }
}
