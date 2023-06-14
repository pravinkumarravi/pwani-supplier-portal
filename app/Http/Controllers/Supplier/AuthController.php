<?php

namespace App\Http\Controllers\Supplier;

use App\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\LoginSupplierRequest;

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

    /**
     * Handle the login attempt for a supplier.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */

    public function handleLogin(LoginSupplierRequest $request): RedirectResponse
    {
        $credentials = $request->only(['email', 'password']);
        $remember = $request->filled('remember-me');

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->route('supplier.dashboard');
        }

        return redirect()->back()
            ->withErrors(['login_error' => 'The provided credentials do not match our records.'])
            ->withInput($request->except('password'));
    }

    /**
     * Handle the registration of a new supplier.
     *
     * @param  StoreSupplierRequest  $request
     * @return RedirectResponse
     */
    public function handleRegister(StoreSupplierRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $supplier = Supplier::create($validatedData);

        event(new Registered($supplier));

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
