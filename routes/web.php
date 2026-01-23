<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WEB\PersonController;
use App\Http\Controllers\ProfileController;

Route::get('/', fn () => view('welcome'));

Route::get('/dashboard', fn () => view('dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [PersonController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [PersonController::class, 'update'])
        ->name('profile.update');

    Route::post('/profile/password', [PersonController::class, 'updatePassword'])
        ->name('profile.password');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';
