<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
Route::get('/artisan-clear-cache', function () {
    $exitCode = Artisan::call('cache:clear');

    // Capture the output of the command
    $output = Artisan::output();

    return "Exit Code: $exitCode <br> Output: <pre>$output</pre>";
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
// Route to clear route cache
Route::get('/route-clear', function () {
    $exitCode = Artisan::call('route:clear');
    // Capture the output of the command
    $output = Artisan::output();
    return "Exit Code: $exitCode <br> Output: <pre>$output</pre>";
});
// migrate
Route::get('/migrate', function () {
    $exitCode = Artisan::call('migrate', ['--force' => true]);
    // Capture the output of the command
    $output = Artisan::output();
    return "Exit Code: $exitCode <br> Output: <pre>$output</pre>";
});
