<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\LoginRequest;
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
        return redirect()->intended(RouteServiceProvider::ADMIN_HOME);
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.auth.index');
    }

}
