<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function index(Request $request): View
    {
        return view('admin.dashboard');
    }

    public function login(Request $request): View
    {
        return view('admin.login');
    }

    public function handleLogin(Request $request): RedirectResponse
    {
        $credentials = $request->safe()->only(['email', 'password']);

        if (Auth::guard('admin')->attempt($credentials)) {

            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.login');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }
}
