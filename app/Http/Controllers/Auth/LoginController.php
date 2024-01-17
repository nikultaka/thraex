<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $this->middleware('admin')->except('logout');


    }

    public function login(Request $request){
        
        $post = $request->post();

        if (!$request->isMethod('post')) {
        return view('auth.login');
        }

        if ($request->isMethod('post')) {

            $this->validate($request, [
                'email'                 => 'required|email',
                'password'              => 'required|min:8|max:20|regex:/^[A-Za-z0-9 ]+$/|alpha_dash',
            ]);

            $credentials = $request->only('email', 'password');
            // $credentials['status'] = 1;

            if (auth()->attempt($credentials)) {
                return redirect()->route('admin.home');
            } else {
                return redirect()->route('login')->with('error', 'Email-Address and Password are wrong.');
            }
            
        }
    }

    public function logout()
    {
        Auth::logout(); 
        return redirect()->route('login');
    }
}
