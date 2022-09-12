<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\BlockController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ThumbnailController;
use App\Http\Controllers\Admin\BlogController;


Route::middleware(['auth','can:admin'])->group(function () {
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

        Route::name('user.')->prefix('user')->group(function () {
            Route::get('', [UserController::class, 'index'])->name('index');
            Route::post('fetch', [UserController::class, 'fetch'])->name('fetch');
            Route::post('disable', [UserController::class, 'disable'])->name('disable');
            Route::get('show/{id}', [UserController::class, 'show'])->name('show');
        });
        Route::name('report.')->prefix('report')->group(function () {
            Route::get('', [ReportsController::class, 'index'])->name('index');
            Route::post('fetch', [ReportsController::class, 'fetch'])->name('fetch');
            Route::post('action', [ReportsController::class, 'action'])->name('action');
            Route::get('show/{id}', [ReportsController::class, 'show'])->name('show');
        });
        Route::name('block.')->prefix('block')->group(function () {
            Route::get('', [BlockController::class, 'index'])->name('index');
            Route::post('fetch', [BlockController::class, 'fetch'])->name('fetch');
        });

        Route::name('setting.')->prefix('setting')->group(function () {
            Route::get('{slug}', [SettingController::class, 'index'])->name('index');
            Route::post('fetch', [SettingController::class, 'fetch'])->name('fetch');
            Route::post('edit', [SettingController::class, 'edit'])->name('edit');
            Route::post('store', [SettingController::class, 'store'])->name('store');
            Route::post('destroy', [SettingController::class, 'destroy'])->name('destroy');
        });
        Route::name('settings.')->prefix('settings')->group(function () {
            Route::get('{type}', [SettingsController::class, 'index'])->name('index');
            Route::post('fetch', [SettingsController::class, 'fetch'])->name('fetch');
            Route::post('edit', [SettingsController::class, 'edit'])->name('edit');
            Route::post('store', [SettingsController::class, 'store'])->name('store');
            Route::post('destroy', [SettingsController::class, 'destroy'])->name('destroy');
        });
        Route::name('sliders.')->prefix( 'sliders')->group(function () {
            Route::get('', [SliderController::class, 'index'])->name('index');
            Route::post('', [SliderController::class, 'fetch'])->name('fetch');
            Route::post('store', [SliderController::class, 'store'])->name('store');
            Route::post('edit', [SliderController::class, 'edit'])->name('edit');
            Route::post('update', [SliderController::class, 'update'])->name('update');
            Route::post('delete', [SliderController::class, 'destroy'])->name('destroy');
        });
        Route::name('thumbnails.')->prefix( 'thumbnails')->group(function () {
            Route::get('', [ThumbnailController::class, 'index'])->name('index');
            Route::post('', [ThumbnailController::class, 'fetch'])->name('fetch');
            Route::post('store', [ThumbnailController::class, 'store'])->name('store');
            Route::post('edit', [ThumbnailController::class, 'edit'])->name('edit');
            Route::post('update', [ThumbnailController::class, 'update'])->name('update');
            Route::post('delete', [ThumbnailController::class, 'destroy'])->name('destroy');
        });
        Route::name('blog.')->prefix( 'blog')->group(function () {
            Route::get('', [BlogController::class, 'index'])->name('index');
            Route::post('', [BlogController::class, 'fetch'])->name('fetch');
            Route::post('store', [BlogController::class, 'store'])->name('store');
            Route::post('edit', [BlogController::class, 'edit'])->name('edit');
            Route::post('update', [BlogController::class, 'update'])->name('update');
            Route::post('delete', [BlogController::class, 'destroy'])->name('destroy');
        });

    });
});