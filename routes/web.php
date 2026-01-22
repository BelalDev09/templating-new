<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WEB\PersonController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Profile view (edit page) - GET
    Route::get('/profile', [PersonController::class, 'index'])->name('profile.index');
    Route::get('/profile', [PersonController::class, 'edit'])->name('profile.edit');

    // Profile update - PATCH
    Route::patch('/profile', [PersonController::class, 'update'])->name('profile.update');

    // Password update - POST
    Route::post('/profile/password', [PersonController::class, 'updatePassword'])->name('profile.password');

    // Account delete - DELETE
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
