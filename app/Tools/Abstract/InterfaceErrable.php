<?php

namespace App\Tools\Abstract;

class InterfaceErrable{
    protected $valid, $error;

    public function __construct(){
        $this->valid = true;
        $this->error = [];
    }

    protected function setError($code, $message){
        $this->valid = false;
        $this->error = ["code"=>$code, "message"=>$message];
    }
    public function isValid(){
        return $this->valid;
    }
    public function getError(){
        return $this->error;
    }
    public function getErrorMessage(){
        return $this->error["message"];
    }
    public function getErrorCode(){
        return $this->error["code"];
    }
}