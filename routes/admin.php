<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\StoresController;
use App\Http\Controllers\Admin\CouponsController;
use App\Http\Controllers\Admin\NetworksController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\DeleteController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;
// Admin routes


Route::middleware([RoleMiddleware::class])->group(function () {

    Route::controller(AdminController::class)->name('admin.')->group(function () {
            // Dashboard Routes
            Route::get('/admin/dashboard', 'dashboard')->name('dashboard');
            Route::get('/admin/dashboard/stats', 'getStats')->name('dashboard.stats');
            Route::get('/admin/dashboard/period/{period}', 'getPeriodStats')->name('dashboard.period');
            Route::get('/admin/dashboard/refresh', 'refreshStats')->name('dashboard.refresh');

            // User Routes
            Route::get('/admin/users', 'index')->name('user.index');
            Route::get('/admin/user/create', 'create_user')->name('user.create');
            Route::post('/admin/user/store', 'store_user')->name('user.store');
            Route::get('/admin/user/edit/{id}', 'edit_user')->name('user.edit');
            Route::post('/admin/user/update/{id}', 'update_user')->name('user.update');
            Route::delete('/admin/users/{id}', 'destroy')->name('user.destroy');
            Route::get('/admin/user/{id}', 'show_user')->name('user.show');
            Route::post('/admin/user/deleteSelected', 'deleteSelected')->name('user.deleteSelected');
            Route::get('/admin/settings', 'settings')->name('settings');
            Route::post('/admin/settings/update', 'update_settings')->name('settings.update');
        });
        Route::controller(DeleteController::class)->name('admin.')->group(function () {
            Route::get('/admin/delete-store', 'deletedStores')->name('delete_store');
            Route::get('/admin/delete-store/delete{id}', 'delete')->name('delete-store-delete');
        });
    // Stores Routes Begin
    Route::controller(LanguageController::class)->prefix('admin')->group(function () {
        Route::get('/lang', 'language')->name('admin.lang.index');
        Route::get('/lang/Create', 'create_language')->name('admin.lang.create');
        Route::post('/lang/stores', 'store_language')->name('admin.lang.store');
        Route::get('/lang/edit/{id}', 'edit_language')->name('admin.lang.edit');
        Route::post('/lang/update/{id}', 'update_language')->name('admin.lang.update');
        Route::get('/lang/delete/{id}', 'delete_language')->name('admin.lang.delete');
        Route::post('/lang/deleteSelected', 'deleteSelected')->name('admin.lang.deleteSelected');
        Route::get('/lang/{slug}', 'StoreDetails')->name('admin.details');
    });

    // AdminBlogs Routes Begin
    Route::controller(BlogController::class)->prefix('admin')->name('admin.blog.')->group(function () {
        Route::get('/blog',  'index')->name('index');
        Route::get('/blog/create',  'create')->name('create');
        Route::post('/blog/store', 'store')->name('store');
        Route::get('/blog/{id}/edit', 'edit')->name('edit');
        Route::post('/admin/blog/update/{id}', 'update')->name('update');
        Route::get('/blog/{id}', 'show')->name('show');
        Route::delete('/blog/{id}', [BlogController::class, 'destroy'])->name('delete');
        Route::post('/blog/deleteSelected', [BlogController::class, 'deleteSelected'])->name('deleteSelected');
        Route::delete('/blog/bulk-delete', [BlogController::class, 'deleteSelected'])->name('bulkDelete');
        Route::post('/blog/create', 'checkSlug')->name('check.slug');
    });

    // Stores Routes Begin
    Route::controller(StoresController::class)->prefix('admin')->name('admin.')->group(function () {
        Route::get('/store', 'store')->name('store.index');
        Route::get('/Store/Create', 'create_store')->name('store.create');
        Route::post('/store/stores', 'store_store')->name('store.store');
        Route::get('/store/edit/{id}', 'edit_store')->name('store.edit');
        Route::post('/store/update/{id}', 'update_store')->name('store.update');
        Route::get('/store/delete/{id}', 'delete_store')->name('store.delete');
        Route::post('/store/deleteSelected', 'deleteSelected')->name('store.deleteSelected');
        Route::get('/stores/{slug}', 'StoreDetails')->name('store_details');
        Route::post('/check-slug', 'checkSlug')->name('check.slug');
    });


    // Categories Routes Begin
    Route::controller(CategoriesController::class)->prefix('admin')->group(function () {
        Route::get('/category', 'category')->name('admin.category.index');
        Route::get('/category/create', 'create_category')->name('admin.category.create');
        Route::post('/category/store', 'store_category')->name('admin.category.store');
        Route::get('/category/edit/{id}', 'edit_category')->name('admin.category.edit');
        Route::post('/category/update/{id}', 'update_category')->name('admin.category.update');
        Route::get('/category/delete/{id}', 'delete_category')->name('admin.category.delete');
         Route::post('/category/deleteSelected', 'deleteSelected')->name('admin.category.deleteSelected');
    });


    // Networks Routes Begin
    Route::controller(NetworksController::class)->prefix('admin')->group(function () {
        Route::get('/network', 'network')->name('admin.network.index');
        Route::get('/network/create', 'create_network')->name('admin.network.create');
        Route::post('/network/store', 'store_network')->name('admin.network.store');
        Route::get('/network/edit/{id}', 'edit_network')->name('admin.network.edit');
        Route::post('/network/update/{id}', 'update_network')->name('admin.network.update');
        Route::get('/network/delete/{id}', 'delete_network')->name('admin.network.delete');
    });

    // Coupons Routes Begin


    Route::controller(CouponsController::class)->prefix('admin')->group(function () {
        Route::get('/coupon', 'index')->name('admin.coupon.index');
        Route::get('/coupon/create', 'create')->name('admin.coupon.create');
        Route::post('/coupon/store', 'store')->name('admin.coupon.store');
        Route::get('/coupon/edit/{id}', 'edit')->name('admin.coupon.edit');
        Route::post('/coupon/update/{id}', 'update')->name('admin.coupon.update');
        Route::get('/coupon/delete/{id}', 'delete')->name('admin.coupon.delete');
        Route::post('/coupon/sortable', 'update_clicks')->name('admin.coupon.sortable');
        Route::post('/coupon/deleteSelected', 'deleteSelected')->name('admin.coupon.deleteSelected');
        // New routes for enhanced functionality
        Route::get('/coupon/show/{id}', 'show')->name('admin.coupon.show');
        Route::post('/coupon/bulkUpdate', 'bulk_update')->name('admin.coupon.bulkUpdate');
        Route::get('/coupon/export', 'export')->name('admin.coupon.export');
        Route::get('/store/coupons/{store_id}', 'store_coupons')->name('admin.store.coupons');
        // Route for store-specific coupons (for the store header view)
        Route::get('/store/{store_id}/coupons', 'storeCoupons')->name('admin.coupon.storeList');
    });

});
