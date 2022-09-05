<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ReportController;
use App\Http\Controllers\User\SettingsController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\PayPalController;
use App\Http\Controllers\User\OtherController;
use App\Http\Controllers\User\AlbumController;
use App\Http\Controllers\User\FriendController;
use App\Http\Controllers\User\MatchController;
use App\Http\Controllers\User\BlockController;
use App\Http\Controllers\User\SearchController;
use App\Http\Controllers\User\NotificationController;
use App\Http\Controllers\User\ChatController;

Route::middleware(['auth'])->group(function () {
    Route::get('register/basic-info', [UserController::class, 'basic_info'])->name('user.basic.info');
    Route::post('register/basic-info/store', [UserController::class, 'basic_info_store'])->name('user.basic.info.store');
    Route::get('register/verification-email/sent', [UserController::class, 'verification_email_sent'])->name('user.verification.email.sent');
    Route::get('verification-link/{username}/{token}', [UserController::class, 'verification_link'])->name('user.verification.link');
    Route::post('verification-link-resend', [UserController::class, 'resend_link'])->name('user.verification.resend');
});
Route::middleware(['auth', 'user-status', 'can:user', 'email-verification'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::prefix('report')->group(function () {
            Route::post('store', [ReportController::class, 'store'])->name('report.store');
        });

        Route::get('welcome', [ProfileController::class, 'welcome'])->name('user.welcome');
        Route::get('home', [ProfileController::class, 'home'])->name('user.home');
        Route::get('invite', [ProfileController::class, 'invite'])->name('user.invite');
        Route::get('birthdays', [ProfileController::class, 'birthdays'])->name('user.birthdays');
        Route::post('send-invite', [ProfileController::class, 'invite_submit'])->name('invite.submit');
        Route::post('cover-photo/remove', [ProfileController::class, 'cover_photo_remove'])->name('user.cover.photo.delete');
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
        //
        Route::middleware(['profile-completion-pending'])->group(function () {
            Route::prefix('settings')->group(function () {
                Route::prefix('subscription')->group(function () {
                    Route::get('', [SettingsController::class, 'index'])->name('settings.subscription');
                    Route::get('gateway', [PaymentController::class, 'gateway'])->name('settings.payments.gateway');
                    Route::get('process', [PaymentController::class, 'process'])->name('settings.payments.process');
                    Route::post('process/store', [PaymentController::class, 'after_payment'])->name('payment.success');
                });

                Route::get('change-password', [SettingsController::class, 'index'])->name('settings.change.password.show');
                Route::get('delete-account', [SettingsController::class, 'index'])->name('settings.delete.account.show');
                Route::get('account', [SettingsController::class, 'index'])->name('settings.account.show');
                Route::get('email-notification', [SettingsController::class, 'index'])->name('settings.email.notification.show');
                Route::get('blocked-members', [SettingsController::class, 'index'])->name('settings.block.members.show');
                Route::post('update-password', [SettingsController::class, 'change_password'])->name('settings.change.password.update');
                Route::post('update-account', [SettingsController::class, 'account'])->name('settings.account.update');
                Route::post('disable-account', [SettingsController::class, 'status'])->name('settings.disable.account');
                Route::post('remove-block', [SettingsController::class, 'unblock'])->name('settings.block.remove');
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
            Route::group(['prefix' => 'album'], function () {
                Route::get('manage', [AlbumController::class, 'index'])->name('user.album.manage');
                Route::get('add-photos', [AlbumController::class, 'index'])->name('user.album.add');
                Route::post('store', [AlbumController::class, 'store'])->name('user.album.store');
                Route::post('delete', [AlbumController::class, 'delete'])->name('user.album.delete');
            });

            Route::group(['prefix' => 'friends'], function () {
                Route::get('', [FriendController::class, 'show'])->name('friend.show');
                Route::post('send-request', [FriendController::class, 'send_request'])->name('friend.send.request');
                Route::post('show-control', [FriendController::class, 'show_control'])->name('friend.show.control');
                Route::post('cancel-control', [FriendController::class, 'cancel_request'])->name('friend.cancel.request');
                Route::post('request-action', [FriendController::class, 'action'])->name('friend.request.action');
                Route::post('un-friend', [FriendController::class, 'un_friend'])->name('friend.remove.friend');
            });
            Route::group(['prefix' => 'match'], function () {
                Route::get('', [MatchController::class, 'show'])->name('match.show');
                Route::get('you-like', [MatchController::class, 'you_like'])->name('match.you.like');
                Route::get('mutual', [MatchController::class, 'mutual'])->name('match.mutual');
                Route::get('who-like-me', [MatchController::class, 'me_like'])->name('match.me.like');
                Route::get('you-do-not-like', [MatchController::class, 'you_unlike'])->name('match.you.unlike');
                Route::post('action', [MatchController::class, 'action'])->name('match.action');
                Route::post('remove', [MatchController::class, 'remove'])->name('match.remove');
            });
            Route::group(['prefix' => 'search'], function () {
                Route::get('', [SearchController::class, 'show'])->name('search.show');
            });
            Route::group(['prefix' => 'block'], function () {
                Route::post('blocked', [BlockController::class, 'blocked'])->name('block.blocked');
            });
            Route::group(['prefix' => 'notification'], function () {
                Route::get('', [NotificationController::class, 'show'])->name('notification.show');
                Route::post('delete', [NotificationController::class, 'delete'])->name('notification.delete');
                Route::post('mark-as-read', [NotificationController::class, 'mark_as_read'])->name('notification.mark.as.read');
            });
        });
        Route::get('profile-pending', function () {
            return view('user.profile_complete');
        })->name('user.profile.pending');

    });
});