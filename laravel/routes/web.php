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
use App\Models\Fertilizer;
use App\Models\Crop;

// Home page (first page)
Route::get('/', function () {
    $tools = Tool::orderBy('title')->get();
    $fertilizers = Fertilizer::orderBy('title')->get();
    $crops = Crop::orderBy('name')->get();
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
Route::get('/tools/rake', function () {return view('tools.rake.index');})->name('tools.rake');
Route::get('/tools/spading_fork', function () {return view('tools.spading_fork.index');})->name('tools.spading_fork');
Route::get('/tools/scythe', function () {return view('tools.scythe.index');})->name('tools.scythe');
Route::get('/tools/weeding_hoe', function () {return view('tools.weeding_hoe.index');})->name('tools.weeding_hoe');
Route::get('/tools/sickle', function () {return view('tools.sickle.index');})->name('tools.sickle');
Route::get('/tools/spreyer', function () {return view('tools.spreyer.index');})->name('tools.spreyer');
Route::get('/tools/irrigation_pump', function () {return view('tools.irrigation_pump.index');})->name('tools.irrigation_pump');
Route::get('/tools/lawn_mower', function () {return view('tools.lawn_mower.index');})->name('tools.lawn_mower');
Route::get('/tools/sprinkler', function () {return view('tools.sprinkler.index');})->name('tools.sprinkler');
Route::get('/tools/seed_drill', function () {return view('tools.Seed_Drill.index');})->name('tools.seed_drill');

// Fertilizers Routes
Route::get('/fertilizers', [FertilizersController::class, 'index'])->name('fertilizers.index');
Route::get('/fertilizers/{id}', [FertilizersController::class, 'show'])->name('fertilizers.show');
Route::get('/fertilizers/gypsum', function () {return view('fertilizers.gypsum.index');})->name('fertilizers.gypsum');
Route::get('/fertilizers/urea', function () {return view('fertilizers.urea.index');})->name('fertilizers.urea');
Route::get('/fertilizers/boron', function () {return view('fertilizers.boron.index');})->name('fertilizers.boron');
Route::get('/fertilizers/magnesium', function () {return view('fertilizers.magnesium.index');})->name('fertilizers.magnesium');
Route::get('/fertilizers/mixed', function () {return view('fertilizers.mixed.index');})->name('fertilizers.mixed');
Route::get('/fertilizers/molybdenum', function () {return view('fertilizers.molybdenum.index');})->name('fertilizers.molybdenum');
Route::get('/fertilizers/zinc', function () {return view('fertilizers.zinc.index');})->name('fertilizers.zinc');
Route::get('/fertilizers/phosphate', function () {return view('fertilizers.phosphate.index');})->name('fertilizers.phosphate');
Route::get('/fertilizers/potassium', function () {return view('fertilizers.potassium.index');})->name('fertilizers.potassium');
Route::get('/fertilizers/sulfur', function () {return view('fertilizers.sulfur.index');})->name('fertilizers.sulfur');

// Crops Routes
Route::get('/crops', [CropsController::class, 'index'])->name('crops.index');
Route::get('/crops/blackcowpea', function () {return view('crop.blackcowpea.index');})->name('crops.blackcowpea');
Route::get('/crops/corn', function () {return view('crop.corn.index');})->name('crops.corn');
Route::get('/crops/peanut', function () {return view('crop.peanut.index');})->name('crops.peanut');
Route::get('/crops/redpepper', function () {return view('crop.redpepper.index');})->name('crops.redpepper');
Route::get('/crops/sorghum', function () {return view('crop.sorghum.index');})->name('crops.sorghum');
Route::get('/crops/sunflower', function () {return view('crop.sunflower.index');})->name('crops.sunflower');
Route::get('/crops/mung', function () {return view('crop.mung.index');})->name('crops.mung');
Route::get('/crops/cowpea', function () {return view('crop.cowpea.index');})->name('crops.cowpea');
Route::get('/crops/fieldpea', function () {return view('crop.fieldpea.index');})->name('crops.fieldpea');
Route::get('/crops/chikpea', function () {return view('crop.chikpea.index');})->name('crops.chikpea');
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

    // Orders Management
    Route::get('/orders', [CartController::class, 'adminOrders'])->name('orders');
    Route::get('/orders/{id}', [CartController::class, 'viewOrder'])->name('order.view');
    Route::post('/orders/{id}/status', [CartController::class, 'updateOrderStatus'])->name('order.update-status');
});
Route::get('/tools/{id}', [ToolsController::class, 'show'])->name('tools.show');
