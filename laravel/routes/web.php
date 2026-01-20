<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SupplierAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ToolsController;
use App\Http\Controllers\FertilizersController;
use App\Http\Controllers\CropsController;
use App\Http\Controllers\SupplierController;
use App\Models\Tool;
use App\Models\Fertilizer;
use App\Models\Crop;

// Home page (first page)
Route::get('/', function () {
    $tools = Tool::orderBy('title', 'asc')->get();
    $fertilizers = Fertilizer::orderBy('title', 'asc')->get();
    $crops = Crop::orderBy('name', 'asc')->get();
    return view('home', compact('tools', 'fertilizers', 'crops'));
})->name('home');

// Authentication Routes
Route::middleware('web')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.store');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.store');
});

// Profile Routes (Protected)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
});

// Tools Routes
Route::get('/tools', [ToolsController::class, 'index'])->name('tools.index');
Route::get('/tools/{id}', [ToolsController::class, 'show'])->name('tools.show');
// Fertilizers Routes
Route::get('/fertilizers', [FertilizersController::class, 'index'])->name('fertilizers.index');
Route::get('/fertilizers/{id}', [FertilizersController::class, 'show'])->name('fertilizers.show');

// Crops Routes
Route::get('/crops', [CropsController::class, 'index'])->name('crops.index');
Route::get('/crops/{crop}', [CropsController::class, 'show'])->name('crops.show');

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/remove/{itemKey}', [CartController::class, 'remove'])->name('cart.remove');
Route::put('/cart/update/{itemKey}', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

Route::middleware('auth')->group(function () {
    Route::get('/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('auth.check_out');
    Route::post('/checkout/place', [App\Http\Controllers\CartController::class, 'placeOrder'])->name('checkout.place');
    Route::get('/orders', [App\Http\Controllers\CartController::class, 'orders'])->name('orders.index');
    Route::post('/orders/{id}/cancel', [App\Http\Controllers\CartController::class, 'cancelOrder'])->name('orders.cancel');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [ToolsController::class, 'dashboard'])->name('dashboard');

    // Tools Management
    Route::get('/tools', [ToolsController::class, 'adminIndex'])->name('tools.index');
    Route::get('/tools/create', [ToolsController::class, 'create'])->name('tools.create');
    Route::post('/tools', [ToolsController::class, 'store'])->name('tools.store');
    Route::get('/tools/{id}/edit', [ToolsController::class, 'edit'])->name('tools.edit');
    Route::put('/tools/{id}', [ToolsController::class, 'update'])->name('tools.update');
    Route::delete('/tools/{id}', [ToolsController::class, 'destroy'])->name('tools.destroy');

    // Fertilizers Management
    Route::get('/fertilizers', [FertilizersController::class, 'adminIndex'])->name('fertilizers.index');
    Route::get('/fertilizers/create', [FertilizersController::class, 'create'])->name('fertilizers.create');
    Route::post('/fertilizers', [FertilizersController::class, 'store'])->name('fertilizers.store');
    Route::get('/fertilizers/{id}/edit', [FertilizersController::class, 'edit'])->name('fertilizers.edit');
    Route::put('/fertilizers/{id}', [FertilizersController::class, 'update'])->name('fertilizers.update');
    Route::delete('/fertilizers/{id}', [FertilizersController::class, 'destroy'])->name('fertilizers.destroy');

    // Crops Management
    Route::get('/crops', [CropsController::class, 'adminIndex'])->name('crops.index');
    Route::get('/crops/create', [CropsController::class, 'create'])->name('crops.create');
    Route::post('/crops', [CropsController::class, 'store'])->name('crops.store');
    Route::get('/crops/{crop}/edit', [CropsController::class, 'edit'])->name('crops.edit');
    Route::put('/crops/{crop}', [CropsController::class, 'update'])->name('crops.update');
    Route::delete('/crops/{crop}', [CropsController::class, 'destroy'])->name('crops.destroy');

    // Suppliers Management (admin-only add)
    Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
    Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
    Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
    Route::get('/suppliers/{id}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
    Route::put('/suppliers/{id}', [SupplierController::class, 'update'])->name('suppliers.update');
    Route::delete('/suppliers/{id}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');

    // Orders Management
    Route::get('/orders', [CartController::class, 'adminOrders'])->name('orders');
    Route::get('/orders/{id}', [CartController::class, 'viewOrder'])->name('order.view');
    Route::post('/orders/{id}/status', [CartController::class, 'updateOrderStatus'])->name('order.update-status');

    // Product Requests Management
    Route::get('/product-requests', [\App\Http\Controllers\Admin\ProductRequestController::class, 'index'])->name('product-requests.index');
    Route::get('/product-requests/{id}', [\App\Http\Controllers\Admin\ProductRequestController::class, 'show'])->name('product-requests.show');
    Route::post('/product-requests/{id}/approve', [\App\Http\Controllers\Admin\ProductRequestController::class, 'approve'])->name('product-requests.approve');
    Route::post('/product-requests/{id}/reject', [\App\Http\Controllers\Admin\ProductRequestController::class, 'reject'])->name('product-requests.reject');
});

// Supplier Routes
Route::prefix('supplier')->name('supplier.')->group(function () {
    Route::post('/login', [SupplierAuthController::class, 'login'])->name('login');
    Route::post('/logout', [SupplierAuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth:supplier'])->group(function () {
        Route::get('/dashboard', function () {
            return view('supplier.dashboard');
        })->name('dashboard');

        Route::get('/change-password', [SupplierAuthController::class, 'showChangePasswordForm'])->name('change-password');
        Route::post('/change-password', [SupplierAuthController::class, 'changePassword'])->name('change-password.update');

        // Product Requests Routes
        Route::get('/requests', [\App\Http\Controllers\Supplier\ProductRequestController::class, 'index'])->name('requests.index');
        Route::get('/requests/create', [\App\Http\Controllers\Supplier\ProductRequestController::class, 'create'])->name('requests.create');
        Route::post('/requests', [\App\Http\Controllers\Supplier\ProductRequestController::class, 'store'])->name('requests.store');
        Route::get('/requests/{id}', [\App\Http\Controllers\Supplier\ProductRequestController::class, 'show'])->name('requests.show');
        Route::get('/requests/{id}/edit', [\App\Http\Controllers\Supplier\ProductRequestController::class, 'edit'])->name('requests.edit');
        Route::put('/requests/{id}', [\App\Http\Controllers\Supplier\ProductRequestController::class, 'update'])->name('requests.update');
        Route::delete('/requests/{id}', [\App\Http\Controllers\Supplier\ProductRequestController::class, 'destroy'])->name('requests.destroy');
    });
});

Route::get('/tools/{id}', [ToolsController::class, 'show'])->name('tools.show');
