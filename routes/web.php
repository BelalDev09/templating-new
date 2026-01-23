<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WEB\PersonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WEB\CMS\CmsContentController;
use App\Http\Controllers\WEB\CMS\HeroSectionController;
use App\Http\Controllers\WEB\CMS\HowItWorkController;

Route::get('/', fn() => view('welcome'));

Route::get('/dashboard', fn() => view('dashboard'))
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

    // cms
    Route::get('/cms', [CmsContentController::class, 'index'])->name('backend.cms.index');
    Route::get('store', [CmsContentController::class, 'store'])->name('cms.store');
    Route::get('/', [CmsContentController::class, 'landing'])->name('landing');
    // hero section
    Route::get('/cms/hero', [HeroSectionController::class, 'form'])
        ->name('cms.hero.form');

    Route::post('/cms/hero', [HeroSectionController::class, 'store'])
        ->name('cms.hero.store');
    // work section
    Route::get('/cms/how-it-works', [HowItWorkController::class, 'form'])
        ->name('cms.how-it-works.form');

    Route::post('/cms/how-it-works', [HowItWorkController::class, 'store'])
        ->name('cms.how-it-works.store');
});

require __DIR__ . '/auth.php';
