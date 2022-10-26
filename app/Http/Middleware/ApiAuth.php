<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $urlParameters = $request->route()->parameters();
        $authProcesor = null;
        if(isset($urlParameters["version"]) && $urlParameters["version"] == "v1")
            $authProcesor = new \App\Tools\V1\AuthMethod([]);
        elseif(isset($urlParameters["version"]) && $urlParameters["version"] == "v2")
            $authProcesor = new \App\Tools\V2\AuthMethod(["authorization"=>$request->header('authorization')]);
        else
            return response()->json(["(" . $urlParameters["version"] . ") versión incorrecta"], 400);
        
        $authProcesor->process();
        $authProcesor->validate();
        if($authProcesor->isValid())
            return $next($request);
        
        $error = $authProcesor->getError();
        return response()->json($error["message"],$error["code"]);
    }
}
