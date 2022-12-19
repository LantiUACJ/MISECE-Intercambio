<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Tools\RestoreToken;
use App\Mail\ForgotPasswordEmail;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PasswordRecoveryController extends Controller
{
    public function forgotPasswordEmail(){
        return view("user.restore.email");
    }

    public function forgotPasswordEmailSubmit(Request $request){
        $email = $request->input("email");
        $user =User::where("email",$email)->first();
        if($user){
            Mail::to($user)->send(new ForgotPasswordEmail($user));
        }
        
        return view("user.restore.emailSent");
    }

    public function forgotPasswordEmailToken($token){
        $user = User::where("remember_token",$token)->first();
        if($user && RestoreToken::validate($user, $token)){
            return view("user.restore.password");
        }
        return view("user.restore.error");
    }

    public function forgotPasswordEmailTokenSubmit($token, Request $request){
        $user = User::where("remember_token",$token)->first();
        if($user && RestoreToken::validate($user, $token)){
            $data = $request->validate([
                "password"=>"required|same:repeat_password"
            ]);
            $user->password = Hash::make($data["password"]);
            $user->save();
            return redirect("/user/forgot/password/finish");
        }
        return view("user.restore.error");
    }

    public function forgotPasswordEmailFinish(){
        return view("user.restore.confirm");
    }
}
