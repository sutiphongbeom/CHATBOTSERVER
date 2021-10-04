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
    protected $redirectTo = 'login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(request $request){
$input =$request->all();
$this->validate($request,[
'email' => 'required|email',
'password' => 'required'
]);
if(auth()->attempt(array('email' => $input['email'],'password' => $input['password']))){
    if(auth()->user()->is_sotre ===1){
        return redirect()->route('home');
    }else{
        return redirect('login');
    }

}else{
    return redirect('login')->with('error','Username or Password are wrong');
}
    }
}
