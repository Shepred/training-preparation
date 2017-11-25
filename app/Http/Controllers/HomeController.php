<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use App\Course;
use App\Status;
use Auth;
use VatsimSSO;
use Session;
use Redirect;

class HomeController extends Controller
{
    public function index()
    {
        if (session('vatsim_authed') == true){
            $user = User::where('id', '=', Session::get('user')->id)->first();

            return view('home')->with(compact('user','userStatus'));
        }
        else {
        	return view('guest');
        }
    	
    }
}
