<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class NumeroDeUsuarios
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if( User::all()->count() <= 1 ){
            return abort(409, 'Debes crear otro usuario. Se requiere mínimo dos usuarios para poder correr la aplicación.');
        }
        return $next($request);
    }
}
