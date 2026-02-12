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
// Rute za Kontakt formu
// =======================
// Prikaz forme
Route::get('/contact', [ContactController::class, 'indexContact'])->name('contact.form');

// Slanje forme (POST)
Route::post('/contact', [ContactController::class, 'store'])->name('contact.send');

// =======================
// Admin panel - proizvodi
// =======================
Route::middleware(['auth', 'isAdmin'])->group(function () {

    // Lista proizvoda
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products');

    // Dodavanje proizvoda
    Route::get('/admin/add-product', [ProductController::class, 'create'])->name('admin.add-product');
    Route::post('/admin/add-product', [ProductController::class, 'store'])->name('admin.store-product');

    // Izmena proizvoda
    Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');

    // Brisanje proizvoda
    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

    // Admin - svi kontakti
    Route::get('/admin/contacts', [ContactController::class, 'index'])->name('admin.contacts');
});
