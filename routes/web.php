<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;

Route::get('/', [WebsiteController::class,'home'])->name('w.home');
Route::get('/about', [WebsiteController::class,'about'])->name('w.about');
Route::get('/testimonials', [WebsiteController::class,'testimonial'])->name('w.testimonial');
Route::get('/blog', [WebsiteController::class,'blog'])->name('w.blog');
Route::get('/press', [WebsiteController::class,'press'])->name('w.press');
Route::get('/faq', [WebsiteController::class,'faq'])->name('w.faq');

Route::group([],__DIR__.'/other/admin.php');
Auth::routes();