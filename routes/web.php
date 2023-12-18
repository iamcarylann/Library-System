<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookCheckoutController;


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

Route::get('/', [SiteController::class, 'home']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users/create', [UserController::class, 'store']);
Route::get('/users/{user}', [UserController::class, 'edit']);
Route::post('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/delete/{user}', [UserController::class, 'delete']);


Route::get('/books', [BookController::class, 'index'])->name('book.index');
Route::get('/books/create', [BookController::class, 'create'])->name('book.create');
Route::post('/books/store', [BookController::class, 'store'])->name('book.store');
Route::get('/books/{book}', [BookController::class, 'edit']);
Route::post('/books/{book}', [BookController::class, 'update']);
Route::delete('/books/delete/{book}', [BookController::class, 'delete']);



Route::get('/bookcheckouts', [BookCheckoutController::class, 'index'])->name('bookcheckout.index');
Route::get('/bookcheckouts/create', [BookCheckoutController::class, 'create'])->name('bookcheckout.create');
Route::post('/bookcheckouts/store', [BookCheckoutController::class, 'store'])->name('bookcheckout.store');
Route::get('/bookcheckouts/{id}', [BookCheckoutController::class, 'show'])->name('bookcheckout.show');
Route::get('/bookcheckouts/{id}/return', [BookCheckoutController::class, 'returnBook'])->name('bookcheckout.return');

Route::get('/bookcheckouts/{bookcheckout}', [BookcheckoutController::class, 'edit']);
Route::post('/bookcheckouts/{bookcheckout}', [BookcheckoutController::class, 'update']);
Route::delete('/bookcheckouts/delete/{bookcheckout}', [BookcheckoutController::class, 'delete']);



Route::post('/bookcheckouts', [BookCheckoutController::class, 'store'])->name('bookcheckouts.store');
Route::resource('bookcheckouts', BookCheckoutController::class);