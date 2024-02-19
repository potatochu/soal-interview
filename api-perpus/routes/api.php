<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;

// Auth routes
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    // Logout route
    Route::post('logout', [UserController::class, 'logout']);
    // Category routes
    Route::resource('categories', CategoryController::class)->except(['create', 'edit']);
    // Book routes
    Route::resource('books', BookController::class)->except(['create', 'edit']);
    // Borrow and return book routes
    Route::post('books/{id}/borrow', [BookController::class, 'borrowBook']);
    Route::put('books/{id}/return', [BookController::class, 'returnBook']);
    // Get borrowed books by user route
    Route::get('borrowed-books', [BookController::class, 'getBorrowedBooks']);
});
