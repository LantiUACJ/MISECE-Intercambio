<?php 

namespace App\Tools\V1;

use Illuminate\Support\Facades\Auth;
use App\Tools\Template\AbstractAuthMethod;

class AuthMethod extends AbstractAuthMethod{

    public function validate(){
        $this->valid = !Auth::guard('api')->onceBasic("user");
        if(!$this->valid){
            $this->setError(401, "Usuario/contraseña incorrecto");
        }
    }
    
}