<?php

use App\Http\Controllers\UserController;
 
Route::get('/register', [UserController::class, 'showRegistrationForm']);
Route::post('/register', [UserController::class, 'register'])->name('register');
 
Route::get('/login', [UserController::class, 'showLoginForm']);
Route::post('/login', [UserController::class, 'login'])->name('login');
// Dashboard route
Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware('auth')->name('dashboard');