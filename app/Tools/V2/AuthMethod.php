<?php 

namespace App\Tools\V2;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use Illuminate\Support\Facades\Storage;

class AuthMethod extends \App\Tools\Template\AbstractAuthMethod{

    public function validate(){
        $jwt = str_replace("Bearer ", "", $this->data["authorization"]);
        if(!$jwt){
            $this->setError(401,"No se encontró JWT");
            return false;
        }
        $header = json_decode(base64_decode(explode('.',$jwt)[0]));
        if(!$header){
            $this->setError(401,"Formato del JWT incorrecto");
            return false;
        }
        if(!isset($header->cert)){
            $this->setError(401,"No se incluyo en la cabecera el certificado");
            return false;
        }
        $cert = openssl_x509_read($header->cert);

        
        //openssl_x509_parse($cert)["subject"]["CN"];
        //echo openssl_x509_parse($cert)["subject"]["CN"];

        /* validar cert */
        $CAcert = Storage::disk('s3')->get('CA.crt');
        
        $validation = openssl_x509_verify($cert, openssl_pkey_get_public($CAcert));
        if(!$validation){
            $this->setError(401,"Certificado inválido");
            return false;
        }
        
        /* validar firma */
        try{
            JWT::decode($jwt, new Key($header->cert, 'RS512'));
        }
        catch(\Exception $ex){
            $this->setError(401,"Firma del JWT incorrecta");
            return false;
        }

        $this->valid = true;
    }
}