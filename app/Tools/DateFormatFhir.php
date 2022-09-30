<?php 
namespace App\Tools;

use \Carbon\Carbon;

class DateFormatFhir{

    public function __construct($date){
        $this->regex =  '/([0-9]([0-9]([0-9][1-9]|[1-9]0)|[1-9]00)|[1-9]000)(-(0[1-9]|1[0-2])(-(0[1-9]|[1-2][0-9]|3[0-1])(T([01][0-9]|2[0-3]):[0-5][0-9]:([0-5][0-9]|60)(\.[0-9]+)?(Z|(\+|-)((0[0-9]|1[0-3]):[0-5][0-9]|14:00)))?)?)?/';
        $this->date = $date;
    }

    public function validate(){
        if($this->date){
            return preg_match($this->regex, $this->date);
        }
    }

    public function getDate(){
        //2015-02-07T13:28:17-05:00
        if(strlen($this->date) >= 25){
            return Carbon::createFromFormat('Y-m-d\TH:i:sP', $this->date);
        }
        //2017-01-01T00:00:00.000Z
        elseif(strlen($this->date) >= 24){
            return Carbon::createFromFormat('Y-m-d\TH:i:s.uP', $this->date);
        }
        //1905-08-23
        elseif(strlen($this->date) >= 10){
            return Carbon::createFromFormat('Y-m-d', $this->date);
        }
        //1973-06
        elseif(strlen($this->date) >= 7){
            return Carbon::createFromFormat('Y-m-d', $this->date."-01");
        }
        //2018
        elseif(strlen($this->date) >= 4 ){
            return Carbon::createFromFormat('Y-m-d', $this->date."-01-01");
        }
    }

}