<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::view('/login', 'login')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::view('/register', 'register')->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');










Route::fallback(function(){ return view('notfound'); });