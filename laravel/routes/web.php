<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ToolsController;
use App\Http\Controllers\FertilizersController;
use App\Http\Controllers\CropsController;
use App\Models\Tool;

// Home page (first page)
Route::get('/', function () {
    $tools = Tool::orderBy('title')->get();
    return view('home', compact('tools'));
})->name('home');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');

// Profile Routes (Protected)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
});

// Tools Routes
Route::get('/tools', [ToolsController::class, 'index'])->name('tools.index');

// Fertilizers Routes
Route::get('/fertilizers', [FertilizersController::class, 'index'])->name('fertilizers.index');

// Crops Routes
Route::get('/crops', [CropsController::class, 'index'])->name('crops.index');
Route::get('/crops/{crop}', [CropsController::class, 'show'])->name('crops.show');

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/remove/{itemKey}', [CartController::class, 'remove'])->name('cart.remove');
Route::put('/cart/update/{itemKey}', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
