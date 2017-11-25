<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\User;
use DB;
use Auth;
use VatsimSSO;
use Session;
use Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function Login()
    {
        $returnUrl = url('login/validate');

        return VatsimSSO::login(
            $returnUrl,
            function($key, $secret, $url) {
                Session::put('vatsimauth', compact('key', 'secret'));
                return Redirect::to($url);
            },
            function($e) {
                throw $e; // Do something with the exception
            }
        );
    }

    public function validateLogin(Request $request)
    {
        $session = Session::get('vatsimauth');
        Session::forget('vatsimauth');       

        // If user 'returns to site', return to home - $request returns null values
        if (! $request->input('oauth_verifier')){

            flash('Your login has been cancelled.');

            return redirect()->route('home');
        }

        $sso = VatsimSSO::checkLogin($session['key'], $session['secret'], $request->input('oauth_verifier'));
        Session::put('user', $sso->user);

        Session::put('vatsim_authed', true);

        //Check if user already exists in system. If true, don't store anything. If false, store session data.
        $checkUser = User::where('id', '=', Session::get('user')->id)->first();
            if ($checkUser === null) {
                User::create([
                    'id' => Session::get('user')->id,
                    'name_first' => Session::get('user')->name_first,
                    'name_last' => Session::get('user')->name_last,
                    'rating' => Session::get('user')->rating->short,
                ]);
                DB::table('status_user')->insert([
                    'user_id' => Session::get('user')->id,
                    'status_id' => '1',
                ]);
            }
            //If user is not null, eg. exists in the system, update the records in the database with the session values.
            else {
                $user = User::findOrFail(Session::get('user')->id);
                $user->name_first  = Session::get('user')->name_first;
                $user->name_last = Session::get('user')->name_last;
                $user->rating = Session::get('user')->rating->short;
                $user->save();
            }

        //Return to the homepage.
        return Redirect::to('/');
    }

    public function Logout(Request $request)
    {
        $request->session()->flush();
        return Redirect::to('/');
    }
}
