<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo(){
        if(Auth()->user()->role=='admin'){
            return route('admin.dashboard');
        }
        elseif(Auth()->user()->role=='medecin') {
            return route('medecin.dashboard');
        }
        elseif(Auth()->user()->role=='secretaire') {
            return route('secretaire.dashboard');
        }
        else{
            $error='email et/ou mot de passe incorrete(s)!';
            return redirect()->route('accueil',compact('error'));
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /*public function login(Request $request){
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth()->attempt(array('email'=>$input['email'],'password'=>$input['password']))){
            if (Auth()->user()->role=='admin') {
                return redirect()->route('admin.dashboard');
            } else if (Auth()->user()->role=='medecin') {
                return redirect()->route('medecin.dashboard');
            }
            else if (Auth()->user()->role=='secretaire') {
                return redirect()->route('secretaire.dashboard');
            }
            else{
                return redirect()->route('login')->with('error','email and password are wrong');
            }
        }
    }*/
}
