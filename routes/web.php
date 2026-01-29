<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OcenaController;
use App\Http\Controllers\AuthController;

Route::get('/', [OcenaController::class, 'index'])->name('ocene.index');

Route::get('/dodaj-ocenu', [OcenaController::class, 'create'])->name('ocene.create'); 

Route::post('/dodaj-ocenu', [OcenaController::class, 'store'])->name('ocene.store');

Route::get('/register',[AuthController::class, 'showRegistrationForm'])->name('register.form'); 
Route::post('/register',[AuthController::class, 'register'])->name('register'); 

Route::get('/login',[AuthController::class, 'showLoginForm'])->name('login.form'); 
Route::post('/login',[AuthController::class, 'login'])->name('login'); 

Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
