<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OcenaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;


// =======================
// Ocene
// =======================

Route::get('/', [OcenaController::class, 'index'])
    ->name('ocene.index');

Route::get('/dodaj-ocenu', [OcenaController::class, 'create'])
    ->name('ocene.create');

Route::post('/dodaj-ocenu', [OcenaController::class, 'store'])
    ->name('ocene.store');


// =======================
// Auth
// =======================

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


// =======================
// Kontakt
// =======================

Route::get('/contact', [ContactController::class, 'indexContact'])
    ->name('contact.form');

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.send');



// =======================
// ADMIN PANEL
// =======================

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function () {


    // Products

    Route::get('/products', [ProductController::class, 'index'])
        ->name('admin.products');


    Route::get('/products/create', [ProductController::class, 'create'])
        ->name('admin.products.create');


    Route::post('/products', [ProductController::class, 'store'])
        ->name('admin.products.store');


    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])
        ->name('admin.products.edit');


    Route::put('/products/{id}', [ProductController::class, 'update'])
        ->name('admin.products.update');


    Route::delete('/products/{id}', [ProductController::class, 'destroy'])
        ->name('admin.products.destroy');



    // Contacts

    Route::get('/contacts', [ContactController::class, 'index'])
        ->name('admin.contacts');


    Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])
        ->name('admin.contacts.edit');


    Route::put('/contacts/{id}', [ContactController::class, 'update'])
        ->name('admin.contacts.update');


    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])
        ->name('admin.contacts.destroy');

});
