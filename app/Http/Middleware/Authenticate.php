<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use VatsimSSO;
use Session;
use Redirect;


class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {        
        if (session('vatsim_authed') && session('vatsim_authed') == true) {
            return $next($request);
        } else {
            return redirect('/login');
        }
        return $next($request);
    }
}