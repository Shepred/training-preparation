<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mentor;
use App\Status;
use Auth;
use DB;
use VatsimSSO;
use Session;
use Redirect;

class ExamController extends Controller
{
    public function index()
    {
    	$user = User::where('id', '=', Session::get('user')->id)->first();

    	return view('exam.index')->with(compact('user'));
    }
}
