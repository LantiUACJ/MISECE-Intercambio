<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserProtect
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
        if(auth()->user()->rol_id == 1 || ($request->route()->parameters()["user"]->hospital_id == auth()->user()->hospital_id)){
            return $next($request);
        }
        return response('No cuenta con los permisos para realizar la consulta', 401);
    }
}
