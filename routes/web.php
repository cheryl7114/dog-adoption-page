<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDogController;
use App\Http\Controllers\AdminAdoptionRequestController;
use App\Http\Controllers\AdoptionRequestController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DonateController;

// Home route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Dog routes
Route::get('/dogs', [DogController::class, 'index']);
Route::get('/dogs/{id}', [DogController::class, 'show']);

// admin routes
Route::prefix('admin')->middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('dogs', AdminDogController::class)->names([
        'index' => 'admin.dogs.index',
        'create' => 'admin.dogs.create',
        'store' => 'admin.dogs.store',
        'show' => 'admin.dogs.show',
        'edit' => 'admin.dogs.edit',
        'update' => 'admin.dogs.update',
        'destroy' => 'admin.dogs.destroy',
    ]);
    Route::get('/admin/adoption', [AdminAdoptionRequestController::class, 'index'])->name('admin.adoption');
    Route::patch('/admin/adoption/{adoptionRequest}/approve', [AdminAdoptionRequestController::class, 'approveAdoptionRequest'])->name('admin.adoption.approve');
    Route::patch('/admin/adoption/{adoptionRequest}/reject', [AdminAdoptionRequestController::class, 'rejectAdoptionRequest'])->name('admin.adoption.reject');
    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users');
});

Route::get('/adoption/{dog}', [AdoptionRequestController::class, 'create'])->name('adoption.create');
Route::post('/adoption/{dog}', [AdoptionRequestController::class, 'store'])->name('adoption.store');
Route::get('/donate', [DonateController::class, 'index'])->name('donate');
Route::post('/donate/process', [DonateController::class, 'process'])->name('donate.process');

Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'show'])->name('contact');
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');

Route::view('/about', 'about')->name('about');
require __DIR__.'/auth.php';