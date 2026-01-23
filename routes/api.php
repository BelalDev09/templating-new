<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
// use App\Http\Controllers\API\CmsController;
use App\Http\Controllers\API\ProfileController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/reset-password', [AuthController::class, 'resetPassword']);
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])
        ->middleware('throttle:3,10'); // 3 request / 10 min
    Route::post('/verify-otp', [AuthController::class, 'verifyOtp']);
});

Route::group([
    'middleware' => 'jwt.auth',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/profile-update', [ProfileController::class, 'updateProfile']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/profile', [AuthController::class, 'profile']);
    // cms page
    // Route::apiResource('cms', CmsController::class);
});
