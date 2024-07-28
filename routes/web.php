<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\CatalogueImageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\WeddingVendorController;
use App\Models\CatalogueImage;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('front.index');

Route::get('/details/{catalogue:slug}', [FrontController::class, 'details'])->name('front.details');

Route::get('/category/{category:slug}', [FrontController::class, 'category'])->name('front.category');

Route::get('/pricing', [FrontController::class, 'pricing'])->name('front.pricing');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');

    Route::get('/learning/{course}/{courseVideoId}', [FrontController::class, 'learning'])->name('front.learning')
    ->middleware('role:student|teacher');

    Route::get('/checkout/{catalogue:id}', [FrontController::class, 'checkout'])->name('front.checkout');
    // ->middleware('role:customer');

    Route::post('/checkout/store/{catalogue:id}', [FrontController::class, 'checkout_store'])->name('front.checkout.store');
    // ->middleware('role:customer');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('categories', CategoryController::class)
        ->middleware('role:owner');
    
        Route::resource('vendors', WeddingVendorController::class)
        ->middleware('role:owner|vendor');
    
        Route::resource('catalogues', CatalogueController::class)
        ->middleware('role:owner|vendor');
    
        Route::resource('book_transactions', BookController::class)
        ->middleware('role:owner');

        Route::get('show_transactions/{book:id}', [BookController::class, 'show'])
        ->middleware('role:owner')
        ->name('catalogue.show_transactions');

        Route::put('approve_transactions/{book:id}', [BookController::class, 'update'])
        ->middleware('role:owner')
        ->name('catalogue.approve_transactions');
    
        Route::get('/add/image/{catalogue:id}', [CatalogueImageController::class, 'create'])
        ->middleware('role:owner|vendor')
        ->name('catalogue.add_image');

        Route::post('/add/image/save/{catalogue:id}', [CatalogueImageController::class, 'store'])
        ->middleware('role:owner|vendor')
        ->name('catalogue.add_image.save');

        Route::resource('catalogue_images', CatalogueImageController::class)
        ->middleware('role:owner|vendor');
    });
});

require __DIR__.'/auth.php';
