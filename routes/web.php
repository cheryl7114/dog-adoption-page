<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DogController;

// Home route
Route::get('/', [HomeController::class, 'index']);

// Dog routes
Route::get('/dogs', [DogController::class, 'index']);
Route::get('/dogs/{id}', [DogController::class, 'show']);