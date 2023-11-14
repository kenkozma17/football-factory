<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Auth\UserProfileInformationController;
use App\Http\Controllers\PlayerSearchController;
use App\Http\Controllers\PlayerRatingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('auth/google', [GoogleController::class, 'signInwithGoogle']);
Route::get('callback/google', [GoogleController::class, 'callbackToGoogle']);

Route::get('/', [PlayerSearchController::class, 'index']);

Route::get('/player/{id}/{slug}', [PlayerController::class, 'show'])->name('player-profile');
Route::get('/rate-player/{id}', [PlayerRatingController::class, 'show'])->name('rate-player');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return Inertia::render('Dashboard');
    // })->name('dashboard');

    Route::put('/user/profile-information/update-location', [UserProfileInformationController::class, 'updateLocation'])
      ->name('user-profile-information.update-location');
    Route::put('/user/profile-information/update-athletic-details', [UserProfileInformationController::class, 'updateAthleticDetails'])
      ->name('user-profile-information.update-athletic-details');
    Route::put('/user/profile-information/update-socials', [UserProfileInformationController::class, 'updateSocials'])
      ->name('user-profile-information.update-socials');
});
