<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UniqueCodeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/login', [PageController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/produk', [PageController::class, 'products'])->name('products');
Route::get('/produk/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/kodeunik', [PageController::class, 'uniqueCode'])->name('unique_code');
Route::post('/kodeunik', [UniqueCodeController::class, 'use'])->name('unique_code.use');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [PageController::class, 'admin'])->name('dashboard');
    Route::resource('/dashboard/products', ProductController::class)->names('admin.products')->except(['destroy', 'show']);
    Route::delete('/dashboard/products/', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    Route::resource('/dashboard/categories', CategoryController::class)->names('admin.categories')->except('destroy');
    Route::delete('/dashboard/categories/', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    Route::get('/dashboard/uniquecode', [UniqueCodeController::class, 'index'])->name('admin.unique_code.index');
    Route::post('/dashboard/uniquecode/generate', [UniqueCodeController::class, 'generate'])->name('admin.unique_code.generate');
    Route::put('/dashboard/uniquecode/regenerate', [UniqueCodeController::class, 'regenerate'])->name('admin.unique_code.regenerate');
    Route::delete('/dashboard/uniquecode/', [UniqueCodeController::class, 'destroy'])->name('admin.unique_code.destroy');
});
