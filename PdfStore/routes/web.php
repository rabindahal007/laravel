<?php
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('home'); // Home route

// Other routes
Route::get('/add', [ProductController::class, 'add'])->name('add');
Route::post('/store', [ProductController::class, 'store'])->name('store');
Route::get('/login', [ProductController::class, 'loginForm'])->name('login');
Route::post('/login', [ProductController::class, 'login'])->name('login.submit');
Route::post('/logout', [ProductController::class, 'logout'])->name('logout');

Route::get('/edit/{book}', [ProductController::class, 'edit'])->name('edit');
Route::put('/update/{book}', [ProductController::class, 'update'])->name('update');
Route::delete('/destroy/{book}', [ProductController::class, 'destroy'])->name('destroy');
Route::post('/import-books', [ProductController::class, 'import'])->name('import.books');
Route::post('/store', [ProductController::class, 'store'])->name('store');
