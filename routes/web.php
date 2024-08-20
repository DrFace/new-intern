<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\categories\categoriesController;
use App\Http\Controllers\products\productsController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('categories', [categoriesController::class, 'index'])->name('categories.index');
Route::get('categories/create', [categoriesController::class, 'create'])->name('categories.create');
Route::get('categories/{id}', [categoriesController::class, 'show'])->name('categories.show');
Route::get('categories/{id}/edit', [categoriesController::class, 'edit'])->name('categories.edit');
Route::post('categories/store', [categoriesController::class, 'store'])->name('categories.store');
Route::patch('categories/{id}/update', [categoriesController::class, 'update'])->name('categories.update');
Route::delete('categories/{id}', [categoriesController::class, 'destroy'])->name('categories.destroy');

Route::get('products', [productsController::class, 'index'])->name('products.index');
Route::get('products/create', [productsController::class, 'create'])->name('products.create');
Route::get('products/{id}', [productsController::class, 'show'])->name('products.show');
Route::get('products/{id}/edit', [productsController::class, 'edit'])->name('products.edit');
Route::post('products/store', [productsController::class, 'store'])->name('products.store');
Route::patch('products/{id}/update', [productsController::class, 'update'])->name('products.update');
Route::delete('products/{id}', [productsController::class, 'destroy'])->name('products.destroy');







Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
