<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Supplier\AuthController as SupplierAuthController;
use App\Http\Controllers\Supplier\DashboardController as SupplierDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Supplier routes
Route::middleware(['auth:supplier', 'verified'])->group(function () {
    Route::redirect('/', '/dashboard')->name('home');
    Route::get('/dashboard', [SupplierDashboardController::class, 'index'])->name('supplier.dashboard');
    Route::get('/logout', [SupplierAuthController::class, 'logout'])->name('supplier.logout');
});

Route::middleware(['auth:supplier'])->group(function () {
    Route::get('/email/verify', static function (Request $request) {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('supplier.dashboard');
        }
        return view('supplier.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $route) {
        $route->fulfill();

        return redirect()->route('supplier.dashboard');
    })->middleware('signed')->name('verification.verify');

    Route::get('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    })->middleware('throttle:6,1')->name('verification.send');
});

// Supplier guest routes
Route::middleware('guest:supplier')->group(function () {
    Route::redirect('/', 'login');
    Route::get('/login', [SupplierAuthController::class, 'login'])->name('supplier.login');
    Route::post('/login', [SupplierAuthController::class, 'handleLogin']);
    Route::get('/register', [SupplierAuthController::class, 'register'])->name('supplier.register');
    Route::post('/register', [SupplierAuthController::class, 'handleRegister']);
    //Route::view('/register/success', 'supplier.welcome')->name('supplier.welcome');
    Route::get('/forgot-password', [SupplierAuthController::class, 'resetPassword'])->name('supplier.reset-password');
    Route::post('/forgot-password', [SupplierAuthController::class, 'handleResetPassword']);
});

// Admin routes
Route::prefix('admin')->group(function () {
    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [AdminAuthController::class, 'index'])->name('admin.dashboard');
        Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    });

    // Admin guest routes
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'login'])->name('admin.login');
        Route::post('/login', [AdminAuthController::class, 'handleLogin']);
    });
});

/**
 * Static page routes
 */
Route::view('/terms',  'terms')->name('terms');
Route::view('/support',  'support')->name('support');
Route::view('/privacy',  'privacy')->name('privacy');
Route::view('/help-center',  'help-center')->name('help-center');
