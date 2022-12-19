<?php 

namespace App\Tools;

use \Carbon\Carbon;

class RestoreToken{

    public static function make($user){

        $time = $user->updated_at->diffInMinutes(Carbon::now());
        $json = [
            "password"=>$user->password,
            "email"=>$user->email,
            "created_at"=>$user->created_at,
            "type"=>$user->type,
            "name"=>$user->name,
            //"remember_token"=>$user->remember_token,
            "token_time"=>$time<=15
        ];
        return hash("md5", json_encode($json));
    }

    public static function validate($user, $token){
        return RestoreToken::make($user) === $token;
    }
}