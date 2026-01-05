<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', [App\Http\Controllers\HomeController::class, 'HomeIndex'])->name('home');
Route::view('/about', 'about')->name('about');


Route::get('/contact', [ContactController::class, 'indexContact'])->name('contact');


Route::get('/admin/contact', [ContactController::class, 'index'])->name('admin.contact');


Route::get('/shop', [App\Http\Controllers\ShopController::class, 'shopIndex'])->name('shop');
