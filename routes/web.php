    <?php

    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\App;
    use App\Http\Controllers\CategoriesController;
    use App\Http\Controllers\SearchController;
    use App\Http\Controllers\ContactController;
    use App\Http\Controllers\CouponsController;
    use App\Http\Controllers\HomeController;
    use App\Http\Controllers\NetworksController;
    use App\Http\Controllers\StoresController;
    use App\Http\Controllers\BlogController;

    use App\Models\Stores;

    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/{locale}', function (string $locale) {
        if (! in_array($locale, ['en', 'fr','nl','es','de'])) { 
          
        }
    
        App::setLocale($locale);
    
        return view('main',);
    });

    Route::get('/network', function () {
        return view('network');
    })->name('network');


    Route::get('/contact', function () { return view('contact'); })->name('contact');

    Route::get('/terms-and-condition', function () {
        return view('terms_and_condition');
    })->name('terms_and_condition');


    Route::get('/privacy', function () {
        return view('privacy');
    })->name('privacy');

    Route::get('/cookies', function () {
        return view('cookies');
    })->name('cookies');
    Route::get('/imprint', function () {
        return view('imprint');
    })->name('imprint');


    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
    Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/stores', 'stores')->name('stores');
    Route::get('/store/{slug}', 'StoreDetails')->name('store_details');
    Route::get('/category/{slug}', 'viewcategory')->name('related_category');
    Route::get('/categories', 'categories')->name('categories');
    Route::get('/blogs', 'blog_home')->name('blog');
    Route::get('/blog/{slug}',  'blog_show')->name('blog-details');
    Route::fallback('notfound')->name('404');

    Route::get('coupons', [CouponsController::class, 'index'])->name('coupons.index');
    Route::put('/updateCoupon/{id}', [CouponsController::class, 'update'])->name('updateCoupon');
    Route::post('/update-clicks', [CouponsController::class, 'updateClicks'])->name('update.clicks');
    Route::get('/clicks/{couponId}', [CouponsController::class, 'openCoupon'])->name('open.coupon');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
    Route::post('/coupons', [CouponsController::class, ''])->name('coupons.updateRanking');
    Route::get('/search', [SearchController::class, 'searchResults'])->name('search');

    });

    ini_set('memory_limit', '1024M');




    Route::middleware('auth')->group(function () {

    // AdminBlogs Routes Begin
    Route::controller(BlogController::class)->prefix('admin')->group(function () {
        Route::get('/blog',  'blogs_show')->name('admin.show');
        Route::get('/blog/create',  'create')->name('admin.blog.create');
        Route::post('/blog/store', 'store')->name('admin.blog.store');
        Route::get('/blog/{id}/edit', 'edit')->name('admin.blog.edit');
        Route::post('/admin/Blog/update/{id}', 'update')->name('admin.Blog.update');
        Route::delete('/admin/Blog/{id}', [BlogController::class, 'destroy'])->name('admin.blog.delete');
        Route::post('/blog/deleteSelected', [BlogController::class, 'deleteSelected'])->name('admin.blog.deleteSelected');
        Route::delete('/blog/bulk-delete', [BlogController::class, 'deleteSelected'])->name('admin.blog.bulkDelete');
    });

    // Stores Routes Begin
    Route::controller(StoresController::class)->prefix('admin')->group(function () {
        Route::get('/store', 'store')->name('admin.store');
        Route::get('/store/create', 'create_store')->name('admin.store.create');
        Route::post('/store/store', 'store_store')->name('admin.store.store');
        Route::get('/store/edit/{id}', 'edit_store')->name('admin.store.edit');
        Route::post('/store/update/{id}', 'update_store')->name('admin.store.update');
        Route::get('/store/delete/{id}', 'delete_store')->name('admin.store.delete');
        Route::post('/store/deleteSelected', 'deleteSelected')->name('admin.store.deleteSelected');
        Route::get('/store/{slug}', 'StoreDetails')->name('admin.store_details');
    });


    // Categories Routes Begin
    Route::controller(CategoriesController::class)->prefix('admin')->group(function () {
        Route::get('/category', 'category')->name('admin.category');
        Route::get('/category/create', 'create_category')->name('admin.category.create');
        Route::post('/category/store', 'store_category')->name('admin.category.store');
        Route::get('/category/edit/{id}', 'edit_category')->name('admin.category.edit');
        Route::post('/category/update/{id}', 'update_category')->name('admin.category.update');
        Route::get('/category/delete/{id}', 'delete_category')->name('admin.category.delete');
         Route::post('/category/deleteSelected', 'deleteSelected')->name('admin.category.deleteSelected');
    });


    // Networks Routes Begin
    Route::controller(NetworksController::class)->prefix('admin')->group(function () {
        Route::get('/network', 'network')->name('admin.network');
        Route::get('/network/create', 'create_network')->name('admin.network.create');
        Route::post('/network/store', 'store_network')->name('admin.network.store');
        Route::get('/network/edit/{id}', 'edit_network')->name('admin.network.edit');
        Route::post('/network/update/{id}', 'update_network')->name('admin.network.update');
        Route::get('/network/delete/{id}', 'delete_network')->name('admin.network.delete');
    });

    // Coupons Routes Begin


    Route::controller(CouponsController::class)->prefix('admin')->group(function () {
        Route::get('/coupon', 'coupon')->name('admin.coupon');
        Route::get('/coupon/create', 'create_coupon')->name('admin.coupon.create');
        Route::get('/coupon/create/code', 'create_coupon_code')->name('admin.coupon.code');
        Route::post('/coupon/store', 'store_coupon')->name('admin.coupon.store');
        Route::get('/coupon/edit/{id}', 'edit_coupon')->name('admin.coupon.edit');
        Route::post('/coupon/update/{id}', 'update_coupon')->name('admin.coupon.update');
        Route::get('/coupon/delete/{id}', 'delete_coupon')->name('admin.coupon.delete');
        Route::post('/custom-sortable', 'update')->name('custom-sortable');
    Route::post('/coupon/deleteSelected', 'deleteSelected')->name('admin.coupon.deleteSelected');});

    });
