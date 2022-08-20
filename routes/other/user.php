<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\SettingsController;
use App\Http\Controllers\User\OtherController;
use App\Http\Controllers\User\FriendController;
use App\Http\Controllers\User\BlockController;
use App\Http\Controllers\User\SearchController;
use App\Http\Controllers\User\ChatController;

Route::middleware(['auth'])->group(function () {
    Route::get('register/basic-info', [UserController::class, 'basic_info'])->name('user.basic.info');
    Route::post('register/basic-info/store', [UserController::class, 'basic_info_store'])->name('user.basic.info.store');
    Route::get('register/verification-email/sent', [UserController::class, 'verification_email_sent'])->name('user.verification.email.sent');
    Route::get('verification-link/{username}/{token}', [UserController::class, 'verification_link'])->name('user.verification.link');
});
Route::middleware(['auth', 'can:user', 'email-verification'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('welcome', [ProfileController::class, 'welcome'])->name('user.welcome');
        Route::get('home', [ProfileController::class, 'home'])->name('user.home');
        Route::get('profile/view/{username}', [ProfileController::class, 'view'])->name('user.profile.view');
        Route::get('profile/edit/{username}', [ProfileController::class, 'edit'])->name('user.profile.edit');
        Route::get('profile/photo', [ProfileController::class, 'p_photo'])->name('user.profile.photo');
        Route::get('edit/location', [ProfileController::class, 'location'])->name('user.location.edit');
        Route::post('update/location', [ProfileController::class, 'location_update'])->name('user.location.update');
        Route::post('basic/store', [ProfileController::class, 'basic'])->name('user.basic.store');
        Route::post('personal/store', [ProfileController::class, 'personal'])->name('user.personal.store');
        Route::post('about-me/store', [ProfileController::class, 'about_me'])->name('user.about.store');
        Route::post('interest/store', [ProfileController::class, 'interest'])->name('user.interest.store');
        Route::post('change-profile', [ProfileController::class, 'profile'])->name('user.profile');
        Route::post('change-cover', [ProfileController::class, 'cover'])->name('user.cover');
        Route::post('change-pre-profile', [ProfileController::class, 'pre_profile'])->name('user.pre.profile');
        Route::prefix('settings')->group(function () {
            Route::get('change-password', [SettingsController::class, 'index'])->name('settings.change.password.show');
            Route::get('account', [SettingsController::class, 'index'])->name('settings.account.show');
            Route::post('update-password', [SettingsController::class, 'change_password'])->name('settings.change.password.update');
            Route::post('update-account', [SettingsController::class, 'account'])->name('settings.account.update');
        });
        Route::group(['prefix' => 'chat'], function () {
            Route::get('{id?}', [ChatController::class, 'index'])->name('user.chat');
            Route::post('fetch_user_list', [ChatController::class, 'fetch_user_list'])->name('chat.fetch.user.list');
            Route::post('store', [ChatController::class, 'store'])->name('chat.store');
            Route::post('show', [ChatController::class, 'show'])->name('chat.fetch.user.messages');
        });
        Route::group(['prefix' => 'other'], function () {
            Route::get('member/profile/show/{username}', [OtherController::class, 'show'])->name('user.profile.other');
        });
        Route::group(['prefix' => 'friends'], function () {
            Route::get('', [FriendController::class, 'show'])->name('friend.show');
            Route::post('send-request', [FriendController::class, 'send_request'])->name('friend.send.request');
            Route::post('show-control', [FriendController::class, 'show_control'])->name('friend.show.control');
            Route::post('cancel-control', [FriendController::class, 'cancel_request'])->name('friend.cancel.request');
            Route::post('request-action', [FriendController::class, 'action'])->name('friend.request.action');
            Route::post('un-friend', [FriendController::class, 'un_friend'])->name('friend.remove.friend');
        });
        Route::group(['prefix' => 'search'], function () {
            Route::get('', [SearchController::class, 'show'])->name('search.show');
        });
        Route::group(['prefix' => 'block'], function () {
            Route::post('blocked', [BlockController::class, 'blocked'])->name('block.blocked');
        });

    });
});