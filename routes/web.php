<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/blogs', [BlogPostController::class, 'index'])->name('blogs.index');
    Route::get('/blogs/create', [BlogPostController::class, 'create'])->name('blogs.create');
    Route::get('/blogs/view/{id}', [BlogPostController::class, 'view'])->name('blogs.view');
    Route::post('/blogs', [BlogPostController::class, 'store'])->name('blogs.store');
    Route::get('/blogs/{id}/edit', [BlogPostController::class, 'edit'])->name('blogs.edit');
    Route::put('/blogs/{id}', [BlogPostController::class, 'update'])->name('blogs.update');
    Route::delete('/blogs/{id}', [BlogPostController::class, 'destroy'])->name('blogs.destroy');
    Route::get('/blogs/searchByCategory', [BlogPostController::class , 'searchByCategory'])->name('blogs.searchByCategory');

    Route::get('/categories/index', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

// Default Laravel authentication routes
Auth::routes();
