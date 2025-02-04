<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;


// Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');
Route::view('/terms', 'terms')->name('terms.show');
Route::view('/privacy-policy', 'privacy-policy')->name('policy.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Admin routes
Route::middleware([RoleMiddleware::class])->group(function () {
Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/coupons','coupons')->name('coupons');
});


Route::fallback(function () {
    return view('errors.404');
});

// Route to clear the cache
Route::get('/clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');

    // Capture the output of the command
    $output = Artisan::output();

    return "Exit Code: $exitCode <br> Output: <pre>$output</pre>";
});

// Route to cache routes
Route::get('/route-cache', function () {
    $exitCode = Artisan::call('route:cache');

    // Capture the output of the command
    $output = Artisan::output();

    return "Exit Code: $exitCode <br> Output: <pre>$output</pre>";
});


require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/employee.php';
require __DIR__.'/home.php';