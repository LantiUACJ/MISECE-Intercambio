<?php 
namespace App\Tools;

class CurlHelper{

    public function __construct($url, $data){
        $this->url = $url;
        $this->data = $data;
    }

    public function post(){
        $this->ch = curl_init();
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->ch, CURLOPT_URL, $this->url);
        curl_setopt($this->ch, CURLOPT_POST, true);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, json_encode($this->data));
        curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, ["content-type: application/fhir+json", "accept: application/fhir+json"]);
        return curl_exec($this->ch);
    }

    public function postJson(){ //modulo de procesamiento
        $this->ch = curl_init();
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->ch, CURLOPT_URL, $this->url);
        curl_setopt($this->ch, CURLOPT_POST, true);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, json_encode($this->data));
        curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, ["content-type: application/json", "accept: application/json"]);
        curl_setopt($this->ch, CURLOPT_TIMEOUT, 300);
        set_time_limit(180);
        return curl_exec($this->ch);
    }

    public function noWaitPost(){ // modulo de registro de eventos
        $this->ch = curl_init();
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->ch, CURLOPT_URL, $this->url);
        curl_setopt($this->ch, CURLOPT_POST, true);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $this->data);
        curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($this->ch, CURLOPT_TIMEOUT, 1);
        return curl_exec($this->ch);
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
        $this->ch = curl_init();
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->ch, CURLOPT_URL, $url);
        curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, true);
        return curl_exec($this->ch);
    }

    public function success(){
        return curl_getinfo($this->ch, CURLINFO_HTTP_CODE);
    }
}