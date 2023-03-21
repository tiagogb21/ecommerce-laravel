<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
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
  }

  public function login()
  {
    return view('auth.login');
  }

  /**
   * Handle a registration request for the application.
   *
   * @param  \Illuminate\Http\Request
   * @return \Illuminate\Http\RedirectResponse
   */

  public function post_login(Request $request)
  {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
      return redirect()->intended('/');
    }

    return back()->withErrors([
      'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
    ]);
  }
}
