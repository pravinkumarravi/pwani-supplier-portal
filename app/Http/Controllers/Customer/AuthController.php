<?php

namespace App\Http\Controllers\Customer;

use App\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

use App\Models\Customer;

class AuthController extends Controller
{
    public function index(Request $request): View
    {
        return view('customer.dashboard');
    }

    public function login(Request $request): View
    {
        return view('customer.login');
    }

    public function register(Request $request): View
    {
        return view('customer.register');
    }

    public function handleLogin(Request $request): RedirectResponse
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials, $request->has('remember-me'))) {

            return redirect()->route('customer.dashboard');
        }

        return redirect()->route('customer.login');
    }

    public function handleRegister(Request $request): RedirectResponse
    {
        $customer = customer::create($request->all());

        if (!($customer instanceof Customer)) {
            return redirect()->route('customer.login');
        }

        event(new  Registered($customer));
        return redirect()->route('customer.welcome');
    }

    public function resetPassword(Request $request): View
    {
        return view('customer.reset-password');
    }

    public function handleResetPassword(Request $request): RedirectResponse
    {
        return redirect()->route('customer.login')->with($request->all());
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('customer')->logout();

        return redirect()->route('customer.login');
    }
}
