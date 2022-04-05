<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Medico
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
        if(auth()->user()->isMedico())
            return $next($request);
        else
            return response('No cuenta con los permisos para realizar la consulta', 401);
    }
}
