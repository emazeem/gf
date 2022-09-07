<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\HomeController;

Route::get('/', [WebsiteController::class,'home'])->name('w.home');
Route::get('/send-mail', [WebsiteController::class,'sendmail'])->name('send.email');
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


// girlfriendvibezllc@gmail.com Emazeem123@ mailchimp

/*
MAIL_DRIVER=smtp
MAIL_HOST=smtp.sendgrid.net
MAIL_PORT=587
MAIL_FROM=noreply@rubicsol.com
MAIL_USERNAME=apikey
MAIL_PASSWORD=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
MAIL_ENCRYPTION=ssl


ALTER TABLE `notifications` ADD `notifiable_type` VARCHAR(225) NOT NULL AFTER `id`, ADD `notifiable_id` VARCHAR(225) NOT NULL AFTER `notifiable_type`;

*/

