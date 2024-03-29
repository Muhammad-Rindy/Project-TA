<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return redirect()->intended('/');
    }

    // Jika login gagal, tambahkan pesan error ke sesi
    Session::flash('error', 'The email or password you entered is incorrect');

    return redirect()->back()->withInput($request->only('email', 'password'));
}


    protected $redirectTo = "/";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        return view('auth.login');
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}