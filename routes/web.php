<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Management\GenresController;
use App\Http\Controllers\Management\BooksController;
use App\Http\Controllers\Order\ProductsController;
use App\Http\Controllers\Order\CheckoutController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::resource('/genres', GenresController::class);
Route::resource('/books', BooksController::class);
Route::post('/books/{genre}', [BooksController::class, 'show']);

Route::resource('/products', ProductsController::class);
Route::post('/products/{keyword}', [ProductsController::class, 'search']);
Route::resource('/checkout', CheckoutController::class);