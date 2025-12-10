    <?php
    require __DIR__.'/admin.php';
    require __DIR__.'/employee.php';
    require __DIR__.'/artisan.php';
    use App\Http\Controllers\ProfileController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Middleware\RoleMiddleware;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\SitemapController;


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

    Route::fallback(function () {
        return view('errors.404');
    });


    Route::get('/generate-sitemap', [SitemapController::class, 'generate']);
    Route::get('/sitemap', [SitemapController::class, 'index'])->name('sitemap');



    require __DIR__.'/auth.php';
    require __DIR__.'/home.php';

