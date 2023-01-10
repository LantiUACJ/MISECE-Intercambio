<?php 
namespace App\Tools\V1;

use App\Models\Hospital;
use \App\Models\HospitalIndice;

class ApiHelper extends \App\Tools\Template\AbstractApiHelper{

    /* Procesa request */
    public function processRequest(){
        $hospital_user = $this->request->headers->get("php-auth-user");
        $this->hospital = Hospital::where("user",$hospital_user)->first();
        if(!$this->hospital){
            $this->setError(400, ["hospital"=>"El usuario de la API no fue encontrado"]);
        }
    }

    private function getHospitalIndice(){
        $query = HospitalIndice::where("indice_id",$this->indice->id);
        if($this->filtraHospital)
            $query->where("hospital_id","<>",$this->hospital->id)->get();
        return $query->get();
    }

    private function addOrganization($hospital){
        $organization = new \App\Fhir\Resource\Organization();
        $address = new \App\Fhir\Element\Address();
        $address->setState($hospital->estado);
        $address->setCity($hospital->ciudad);
        $address->setPostalCode($hospital->codigo_postal);
        $organization->setName($hospital->nombre);
        $organization->addAddress($address);
        return $organization;
    }

    public function getData(){
        $respuestas = "";
        foreach($this->getHospitalIndice() as $hospitalIndice){
            $curlConsulta = new \App\Tools\CurlHelper($hospitalIndice->hospital->url . $this->url, ["curp"=>$this->curp]);
            if($hospitalIndice->hospital->version == "v1")
                $bundle = $curlConsulta->get();
            elseif($hospitalIndice->hospital->version == "v2")
                $bundle = $curlConsulta->postJWT();
            //dd($bundle);
            if($curlConsulta->success() == 200){
                $data = [];
                $respuestas .= $hospitalIndice->hospital->user . ",";
                if(env("MODULO_PROCESAMIENTO", "ignore") != "ignore"){
                    $curlProcesamiento = new \App\Tools\CurlHelper(env("MODULO_PROCESAMIENTO") . "procesarSNOMED/Bundle",$bundle);
                    $procesado = $curlProcesamiento->postJson();
                    if($curlProcesamiento->success() == 200) $data = new \App\Fhir\Resource\Bundle($procesado);
                }
                if(!$data) $data = new \App\Fhir\Resource\Bundle($bundle);
                //dd($data);
                $data->addEntry($this->addOrganization($hospitalIndice->hospital));
                $this->data[] = ["bundle"=>$data,"hospital"=>$hospitalIndice->hospital];
            }
        }

        $this->logData($respuestas);
        //$data = new \App\Tools\JsonProcessHelper($this->data);
        //$this->data = $data->sortDesc();
        //dd($this->data);
    }
}