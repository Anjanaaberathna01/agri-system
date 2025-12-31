<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

// Home page (first page)
Route::get('/', function () {
    return view('home');
})->name('home');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');

// Tools Routes
Route::get('/tools', function () {
    return view('tools.index');
})->name('tools.index');

// Fertilizers Routes
Route::get('/fertilizers', function () {
    return view('fertilizers.index');
})->name('fertilizers.index');
