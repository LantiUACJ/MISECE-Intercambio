<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Ellaisys\Cognito\AwsCognitoClaim;
use Ellaisys\Cognito\Auth\AuthenticatesUsers as CognitoAuthenticatesUsers;

class SiteController extends Controller
{
    use CognitoAuthenticatesUsers;

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
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect("/");
		}
		return back()->withErrors([
			'error' => 'Correo/Contraseña incorrecta',
		]);
    }

    public function loginCognito(Request $request){
        //Convert request to collection
        $collection = collect($request->all());

        //Authenticate with Cognito Package Trait (with 'web' as the auth guard)
        if ($response = $this->attemptLogin($collection, 'web')) {
            if ($response===true) {
                return redirect(route('home'))->with('success', true);
            } else if ($response===false) {
                // If the login attempt was unsuccessful you may increment the number of attempts
                // to login and redirect the user back to the login form. Of course, when this
                // user surpasses their maximum number of attempts they will get locked out.
                //
                //$this->incrementLoginAttempts($request);
                //
                //$this->sendFailedLoginResponse($collection, null);
            } else {
                return $response;
            } //End if
        } //End if
    }

    public function logout(Request $request){
		Auth::logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect('/');
	}
}
