<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OcenaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;


// =======================
// Ocene
// =======================

Route::name('ocene.')->group(function () {

    Route::get('/', [OcenaController::class, 'index'])
        ->name('index');

    Route::get('/dodaj-ocenu', [OcenaController::class, 'create'])
        ->name('create');

    Route::post('/dodaj-ocenu', [OcenaController::class, 'store'])
        ->name('store');

});


// =======================
// Auth
// =======================

Route::name('auth.')->group(function () {

    Route::get('/register', [AuthController::class, 'showRegistrationForm'])
        ->name('register.form');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register');

    Route::get('/login', [AuthController::class, 'showLoginForm'])
        ->name('login.form');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});


// =======================
// Kontakt
// =======================

Route::name('contact.')->group(function () {

    Route::get('/contact', [ContactController::class, 'indexContact'])
        ->name('form');

    Route::post('/contact', [ContactController::class, 'store'])
        ->name('send');

});


// =======================
// ADMIN PANEL
// =======================

Route::middleware(['auth', 'isAdmin'])
->prefix('admin')
->name('admin.')
->group(function () {


// =======================
// Products
// =======================

Route::get('/products', [ProductController::class, 'index'])
->name('products');

Route::get('/products/create', [ProductController::class, 'create'])
->name('products.create');

Route::post('/products', [ProductController::class, 'store'])
->name('products.store');

Route::get('/products/{id}/edit', [ProductController::class, 'edit'])
->name('products.edit');

Route::put('/products/{id}', [ProductController::class, 'update'])
->name('products.update');

Route::delete('/products/{id}', [ProductController::class, 'destroy'])
->name('products.destroy');


// =======================
// Contacts
// =======================

Route::get('/contacts', [ContactController::class, 'index'])
->name('contacts');

Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])
->name('contacts.edit');

Route::put('/contacts/{id}', [ContactController::class, 'update'])
->name('contacts.update');

Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])
->name('contacts.destroy');

});
