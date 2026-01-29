<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
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
=======
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');


Route::get('/contact', [ContactController::class, 'indexContact'])->name('contact');


Route::get('/admin/contact', [ContactController::class, 'index'])->name('admin.contact');


Route::get('/shop', [App\Http\Controllers\ShopController::class, 'shopIndex'])->name('shop');

Route::get('/welcome', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');

Route::post("/send-contact",[ContactController::class,'sendContact'])->name('send.contact');

Route::get('/admin/add-product', [ProductController::class, 'create']);

Route::post('/admin/add-product', [ProductController::class, 'store']);

Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products');
>>>>>>> 3faf0935aace4f9e4e1c2cfea8a82898d5c33d4f
