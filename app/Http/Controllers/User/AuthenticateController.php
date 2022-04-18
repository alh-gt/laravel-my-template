<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class AuthenticateController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.auth.index');
    }

    public function login(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();
        $request->session()->regenerateToken();
        return redirect()->intended(RouteServiceProvider::USER_HOME);
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerate();
        $request->session()->regenerateToken();
        return redirect()->route('user.auth.index');
    }

}
