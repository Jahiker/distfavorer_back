<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthorizedUser
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
        if(Auth::user() != $request->user && Auth::user()->role == 'user'){
            return redirect()->route('home')
                ->with([
                    'message' => "Usuario no autorizado para realizar esta acción",
                    'alert' => "danger",
                    'page' => 'Usuarios'
                ]);
        }

        return $next($request);
    }
}
