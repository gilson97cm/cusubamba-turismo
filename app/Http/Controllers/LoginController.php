<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    public function showLoginForm()
    {
        return view('backend.admin.auth.login');
    }

    protected $redirectTo = '/cusubamba-administrador';

    /**
     * Create a news controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
