<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Default welcome page
Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Auth::routes(); // Includes default Laravel auth routes

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile (only accessible to authenticated users)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin login routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', fn() => view('admin.dashboard'))->name('dashboard');
    });
});

// Home route
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Product CRUD routes (manually defined if you want)
Route::get('/product_list', [ProductController::class, 'index'])->name('product.index')->middleware('userType:user,admin');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create')->middleware('userType:Super Admin,admin,Staff');
Route::post('/product', [ProductController::class, 'store'])->name('product.store')->middleware('userType:admin');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit')->middleware('userType:admin');
Route::patch('/product/{id}', [ProductController::class, 'update'])->name('product.update')->middleware('userType:admin');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy')->middleware('userType:admin');

Route::resource('products', ProductController::class);


// Optional: If you're uploading product images or files
Route::get('/uploads/{filename}', function ($filename) {
    $path = base_path('uploads/' . $filename);
    return response()->file($path);
})->name('product.upload');

// Optional: Use this if you want Laravel to auto-generate CRUD routes
// Route::resource('products', ProductController::class);