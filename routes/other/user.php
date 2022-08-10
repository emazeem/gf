<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ProfileController;

Route::middleware(['auth'])->group(function () {
    Route::get('register/basic-info', [UserController::class, 'basic_info'])->name('user.basic.info');
    Route::post('register/basic-info/store', [UserController::class, 'basic_info_store'])->name('user.basic.info.store');
    Route::get('register/verification-email/sent', [UserController::class, 'verification_email_sent'])->name('user.verification.email.sent');
    Route::get('verification-link/{username}/{token}', [UserController::class, 'verification_link'])->name('user.verification.link');
});
Route::middleware(['auth','can:user','email-verification'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('welcome', [ProfileController::class, 'welcome'])->name('user.welcome');
        Route::get('profile/view/{username}', [ProfileController::class, 'show'])->name('user.profile.view');
        Route::get('profile/edit/{username}', [ProfileController::class, 'edit'])->name('user.profile.edit');
        Route::name('blog.')->prefix( 'blog')->group(function () {
        });

    });
});