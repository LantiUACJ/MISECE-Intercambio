<?php

namespace App\Tools\Template;

class AbstractAuthMethod extends InterfaceErrable{

    protected $data;

    public function __construct($data){
        $this->data = $data;
        $this->error = [];
    }

    public function process(){

    }

    public function validate(){

    }
}