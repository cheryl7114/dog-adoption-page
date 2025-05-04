<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdoptionRequestController;

// Home route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Dog routes
Route::get('/dogs', [DogController::class, 'index']);
Route::get('/dogs/{id}', [DogController::class, 'show']);

// admin routes
Route::prefix('admin')->middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('dogs', AdminDogController::class)->names([
        'index' => 'admin.dogs.index',
        'create' => 'admin.dogs.create',
        'store' => 'admin.dogs.store',
        'show' => 'admin.dogs.show',
        'edit' => 'admin.dogs.edit',
        'update' => 'admin.dogs.update',
        'destroy' => 'admin.dogs.destroy',
    ]);
    // Route::resource('adoption-requests', AdminAdoptionRequestController::class);
    // Route::resource('users', AdminUserController::class);
});

Route::get('/adoption/{dog}', [AdoptionRequestController::class, 'create'])->name('adoption.create');
Route::post('/adoption/{dog}', [AdoptionRequestController::class, 'store'])->name('adoption.store');

require __DIR__.'/auth.php';