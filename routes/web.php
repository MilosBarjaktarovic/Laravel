<?php

use Illuminate\Support\Facades\Route;
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
