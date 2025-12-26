<?php

<<<<<<< HEAD
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');

Route::view('/', 'welcome');

Route::view('/about', 'about')->name('about');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop');
=======
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){
    return view('home');
});

Route::get('/about', function(){
    return view('about');
});

Route::get('/contact', function(){
    return view('contact');
});
Route::get('/shop', function(){
return view('shop');
});
>>>>>>> 8d3a7e5bd4bd47c057e4a2248e0e5784ab860923
