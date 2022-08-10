<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\HomeController;

Route::get('/', [WebsiteController::class,'home'])->name('w.home');
Route::get('/about-us', [WebsiteController::class,'about'])->name('w.about');
Route::get('/contact-us', [WebsiteController::class,'contact'])->name('w.contact');
Route::get('/press', [WebsiteController::class,'press'])->name('w.press');
Route::get('/careers', [WebsiteController::class,'careers'])->name('w.career');
Route::get('/privacy-policy', [WebsiteController::class,'privacy'])->name('w.privacy');
Route::get('/terms-and-conditions', [WebsiteController::class,'terms'])->name('w.terms');
Route::get('/safety', [WebsiteController::class,'safety'])->name('w.safety');
Route::get('/testimonials', [WebsiteController::class,'testimonial'])->name('w.testimonial');
Route::get('/blog/{tags?}', [WebsiteController::class,'blog'])->name('w.blog');
Route::get('/press', [WebsiteController::class,'press'])->name('w.press');
Route::get('/faq', [WebsiteController::class,'faq'])->name('w.faq');
Route::get('/home', [HomeController::class,'home'])->name('home');

Route::group([],__DIR__.'/other/admin.php');
Route::group([],__DIR__.'/other/user.php');
Auth::routes();