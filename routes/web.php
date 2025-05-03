<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DogController;
use App\Http\Controllers\AdoptionRequestController;

// Home route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Dog routes
Route::get('/dogs', [DogController::class, 'index']);
Route::get('/dogs/{id}', [DogController::class, 'show']);

Route::get('/adoption/{dog}', [AdoptionRequestController::class, 'create'])->name('adoption.create');
Route::post('/adoption/{dog}', [AdoptionRequestController::class, 'store'])->name('adoption.store');

require __DIR__.'/auth.php';