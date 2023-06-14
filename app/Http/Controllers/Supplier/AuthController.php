<?php

namespace App\Http\Controllers\Supplier;

use App\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

use App\Models\Supplier;

class AuthController extends Controller
{
    public function index(Request $request): View
    {
        return view('supplier.dashboard');
    }

    public function login(Request $request): View
    {
        return view('supplier.login');
    }

    public function register(Request $request): View
    {
        return view('supplier.register');
    }

    public function handleLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|exists:suppliers,email',
            'password' => 'required|min:8',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials, $request->has('remember-me'))) {
            return redirect()->route('supplier.dashboard');
        }

        $message = 'The provided credentials do not match our records.';
        return redirect()->back()->withErrors(['login_error', $message]);
    }

    public function handleRegister(Request $request): RedirectResponse
    {
        $supplier = Supplier::create($request->all());

        if (!($supplier instanceof Supplier)) {
            return redirect()->route('supplier.login');
        }

        event(new  Registered($supplier));
        return redirect()->route('supplier.welcome');
    }

    public function resetPassword(Request $request): View
    {
        return view('supplier.reset-password');
    }

    public function handleResetPassword(Request $request): RedirectResponse
    {
        return redirect()->route('supplier.login')->with($request->all());
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('supplier')->logout();

        return redirect()->route('supplier.login');
    }

    public function forgotPassword(Request $request): View
    {
        return view('supplier.forgot-password');
    }

    public function handleForgotPassword(Request $request): View
    {
        return view('supplier.password-reset-email-sent');
    }
}
