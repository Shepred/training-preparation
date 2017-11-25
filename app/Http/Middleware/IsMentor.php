<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;
use VatsimSSO;
use Session;

class IsMentor
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
        if (session('vatsim_authed') == true){
            $user = User::where('id', '=', Session::get('user')->id)->first();
        }
        else {
            return redirect('/');
        }

        if ($user->mentor == 1) {
            return $next($request);
        }

        return redirect('/');
    }
}
