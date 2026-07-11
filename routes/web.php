<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OcenaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;

// =======================
// Rute za Ocene
// =======================
Route::get('/', [OcenaController::class, 'index'])->name('ocene.index');
Route::get('/dodaj-ocenu', [OcenaController::class, 'create'])->name('ocene.create');
Route::post('/dodaj-ocenu', [OcenaController::class, 'store'])->name('ocene.store');

// =======================
// Rute za Registraciju i Login
// =======================
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// =======================
// Kontakt forma - korisnik
// =======================
Route::get('/contact', [ContactController::class, 'indexContact'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.send');

// =======================
// Admin panel - middleware auth + isAdmin
// =======================
Route::middleware(['auth', 'isAdmin'])->group(function () {

    // Admin – lista proizvoda
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products');
    Route::get('/admin/add-product', [ProductController::class, 'create'])->name('admin.add-product');
    Route::post('/admin/add-product', [ProductController::class, 'store'])->name('admin.store-product');
    Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

    // Admin – lista kontakata
    Route::get('/admin/contacts', [ContactController::class, 'index'])->name('admin.contacts');
    Route::get('/admin/allContacts', [ContactController::class, 'index'])->name('admin.allContacts');   

    // Edit kontakt
    Route::get('/admin/contacts/{id}/edit', [ContactController::class, 'edit'])->name('admin.contacts.edit');
    Route::put('/admin/contacts/{id}', [ContactController::class, 'update'])->name('admin.contacts.update');

    // Delete kontakt
    Route::delete('/admin/contacts/{id}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');
});
