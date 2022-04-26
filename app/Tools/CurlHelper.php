<?php 
namespace App\Tools;

class CurlHelper{

    public function __construct($url, $data){
        $this->url = $url;
        $this->data = $data;
    }

    public function post(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->data));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["content-type: application/fhir+json", "accept: application/fhir+json"]);
        return json_decode(curl_exec($ch));
    }

    public function postJson(){ //modulo de procesamiento
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($this->data));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["content-type: application/json", "accept: application/json"]);
        curl_setopt($ch, CURLOPT_TIMEOUT, 300);
        set_time_limit(180);
        return json_decode(curl_exec($ch));
    }

    public function noWaitPost(){ // modulo de registro de eventos
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->data);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1);
        return curl_exec($ch);
    }

    private function getParams(){
        $params = "";
        foreach($this->data as $key => $element){
            $params.=$key."=".urlencode($element)."&";
        }
        return substr($params, 0, strlen($params) -1);
    }

    public function get(){
        $params = "?" . $this->getParams();
        $url = $this->url . $params;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        //curl_setopt($ch, CURLOPT_HTTPHEADER, ["content-type: application/json", "accept: application/json"]);
        $data = curl_exec($ch);
        return json_decode($data);
    }
}