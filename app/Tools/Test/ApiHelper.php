<?php 
namespace App\Tools\Test;

use App\Models\Hospital;
use \App\Models\Indice;
use \App\Models\HospitalIndice;

use Aws\Sns\SnsClient; 
use Aws\Exception\AwsException;

class ApiHelper extends \App\Tools\Template\AbstractApiHelper{

    public function getData(){
        $archivoJson = "";
        $jsonTxt = "";
        if($this->type == 1){
            $archivoJson = fopen("json_pruebas/completo.json", "r");
            $jsonTxt = fread($archivoJson,filesize("json_pruebas/completo.json"));
        }
        else{
            $archivoJson = fopen("json_pruebas/basico.json", "r");
            $jsonTxt = fread($archivoJson,filesize("json_pruebas/basico.json"));
        }
        $hospital = new Hospital(["nombre"=>"instituto/hospital de prueba"]);
        $this->data[] = ["bundle"=>new \App\Fhir\Resource\Bundle($jsonTxt),"hospital"=>$hospital];
    }

    public function searchPatient(){
        if($this->curp){
            return true;
        }
        else{
            return false;
        }
    }

    public function validateCode(){
        if($this->codigo)
            return true;
        else
            return false;
    }
}