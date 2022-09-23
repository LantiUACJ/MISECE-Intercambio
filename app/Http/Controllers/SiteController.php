<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use Ellaisys\Cognito\AwsCognitoClaim;
//use Ellaisys\Cognito\Auth\AuthenticatesUsers as CognitoAuthenticatesUsers;

class SiteController extends Controller
{
    //use CognitoAuthenticatesUsers;

    public function index(){
        $user = auth()->user();
        if($user && $user->isAdmin())
            return view("dashboard.admin");
        else if($user && $user->isHospital())
            return view("dashboard.hospital");
        else if($user && $user->isMedico())
            return view("dashboard.medico");
        else if($user && $user->isParamedico())
            return view("dashboard.paramedico");
        else if($user && $user->isPaciente())
            return view("dashboard.paciente");
        else
            return view("site.index");
    }
    public function login(){
        return view("site.login");
    }

    public function loginPost(Request $request){
        $tryData = $this->loginAttempts($request);
        if(!$tryData["status"]){
            return back()->withErrors([
                'error' => 'Intentos máximos alcanzados, tiempo de espera: ' . $tryData["time"] . " minutos.",
            ]);
        }
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect("/");
		}
		return back()->withErrors([
			'error' => 'Correo/Contraseña incorrecta',
		]);
    }

    public function logout(Request $request){
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect('/');
	}

    private function loginAttempts(Request $request){
        $waitTime = 15;
        /* Iniciar variables */
        $date = $request->session()->get('date', Carbon::now());
        $attempt = $request->session()->get('attempt', 0);
        $block = $request->session()->get('block', false);
        $blockTime = $request->session()->get('blockTime', Carbon::now());
        /* Time Calcs */
        if($block){
            $wait = $blockTime->diffInMinutes(Carbon::now());
            if($wait>=$waitTime) {
                $blockTime = Carbon::now();
                $block = false;
                $date = Carbon::now();
                $attempt = -1;
            }
            else{
                return ["status"=>false, "date"=>$date->format("H:i:s"), "attempt"=>$attempt, "block"=>$block, "blockTime"=>$blockTime->format("H:i:s"), "time"=>$waitTime-$wait];
            }
        }
        /* Reset */
        $minutes = $date->diffInMinutes(Carbon::now());
        if($minutes > 1 && !$block){
            $date = Carbon::now();
            $attempt = -1;
        }
        $attempt++;
        if($attempt >3){
            $block = true;
            $blockTime = \Carbon\Carbon::now();
        }
        /* Update session */
        $request->session()->put('date', $date);
        $request->session()->put('attempt', $attempt);
        $request->session()->put('block', $block);
        $request->session()->put('blockTime', $blockTime);
        return ["status"=>true, "date"=>$date->format("H:i:s"), "attempt"=>$attempt, "block"=>$block, "blockTime"=>$blockTime->format("H:i:s")];
    }
}
