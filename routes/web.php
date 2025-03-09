<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingsController;

Route::get('/', function () {
    return view('home', ['active' => 'home']);
})->name('home');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::post('/logout', LogoutController::class)->name('logout');

Route::get('/about', function () {
    return view('about', ['active' => 'about']);
})->name('about');

// Dashboard Routes
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// Posts Routes
Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
    // Route::get('posts', [PostController::class, 'index'])->name('posts.index');
});

// // Categories Routes
// Route::resource('categories', CategoryController::class)->middleware('auth');

// // Settings Routes
// Route::get('/settings', [SettingsController::class, 'index'])->middleware('auth')->name('settings.index');
// Route::get('/settings/edit', [SettingsController::class, 'edit'])->middleware('auth')->name('settings.edit');
// Route::post('/settings/update', [SettingsController::class, 'update'])->middleware('auth')->name('settings.update');

Route::fallback(function() {
    return view('notfound', ['active' => '404']);
});
