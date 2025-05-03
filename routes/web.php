<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DogController;
use App\Http\Controllers\AdminController;

// Home route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Dog routes
Route::get('/dogs', [DogController::class, 'index']);
Route::get('/dogs/{id}', [DogController::class, 'show']);

// admin routes
Route::prefix('admin')->middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    // Route::resource('dogs', AdminDogController::class);
    // Route::resource('adoption-requests', AdminAdoptionRequestController::class);
    // Route::resource('users', AdminUserController::class);
});

require __DIR__.'/auth.php';