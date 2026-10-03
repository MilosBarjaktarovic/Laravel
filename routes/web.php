<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OcenaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;


// =======================
// Ocene
// =======================

Route::name('ocene.')->group(function () {

    Route::get('/ocene', [OcenaController::class, 'index'])
        ->name('index');

    Route::get('/dodaj-ocenu', [OcenaController::class, 'create'])
        ->name('create');

    Route::post('/dodaj-ocenu', [OcenaController::class, 'store'])
        ->name('store');

});


// =======================
// WELCOME
// =======================

Route::get('/', function () {
    return view('welcome');
})->name('home');


// =======================
// SHOP
// =======================

Route::get('/shop', [ShopController::class, 'shopIndex'])
    ->name('shop');


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


// =======================
// PRODUCT PERMALINK
// =======================

Route::get('/products/{product}', [ProductController::class, 'permalink'])
->name('products.permalink');

// =======================
// CART
// =======================

Route::middleware('auth')->group(function () {

Route::post('/add-to-cart', [CartController::class, 'addToCart'])
->name('cart.add');

Route::get('/cart', [CartController::class, 'index'])
->name('cart.index');

Route::post('/cart/checkout',[CartController::class, 'checkout'])
->name('cart.checkout');

Route::delete('/cart/{id}', [CartController::class, 'remove'])
->name('cart.remove');

});
