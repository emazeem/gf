<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\SettingController;

Route::middleware(['auth'])->group(function () {
    Route::name('a.')->prefix('admin')->group(function () {
        Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
        Route::name('faq.')->prefix('faq')->group(function () {
            Route::get('', [FaqController::class, 'index'])->name('index');
            Route::post('fetch', [FaqController::class, 'fetch'])->name('fetch');
            Route::post('edit', [FaqController::class, 'edit'])->name('edit');
            Route::post('store', [FaqController::class, 'store'])->name('store');
            Route::post('destroy', [FaqController::class, 'destroy'])->name('destroy');

            Route::name('category.')->prefix('category')->group(function () {
                Route::get('', [FaqCategoryController::class, 'index'])->name('index');
                Route::post('fetch', [FaqCategoryController::class, 'fetch'])->name('fetch');
                Route::post('edit', [FaqCategoryController::class, 'edit'])->name('edit');
                Route::post('store', [FaqCategoryController::class, 'store'])->name('store');
                Route::post('destroy', [FaqCategoryController::class, 'destroy'])->name('destroy');
            });
        });
        Route::name('testimonial.')->prefix('testimonial')->group(function () {
            Route::get('', [TestimonialController::class, 'index'])->name('index');
            Route::post('fetch', [TestimonialController::class, 'fetch'])->name('fetch');
            Route::post('edit', [TestimonialController::class, 'edit'])->name('edit');
            Route::post('store', [TestimonialController::class, 'store'])->name('store');
            Route::post('destroy', [TestimonialController::class, 'destroy'])->name('destroy');
        });

        Route::name('setting.')->prefix('setting')->group(function () {
            Route::get('{slug}', [SettingController::class, 'index'])->name('index');
            Route::post('fetch', [SettingController::class, 'fetch'])->name('fetch');
            Route::post('edit', [SettingController::class, 'edit'])->name('edit');
            Route::post('store', [SettingController::class, 'store'])->name('store');
            Route::post('destroy', [SettingController::class, 'destroy'])->name('destroy');
        });

    });
});