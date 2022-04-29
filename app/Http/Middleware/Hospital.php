<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Hospital
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
        if(auth()->user()->isHospital())
            return $next($request);
        else
            return response('No cuenta con los permisos para realizar la consulta', 401);
    }
}
