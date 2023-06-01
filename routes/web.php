<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');

Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', function () {
        return "Hi";
    });
});



Route::get('/book_new', [BookController::class, 'create'])->name('book_new');

Route::post('/book_new', [BookController::class, 'store'])->name('books.store');




Route::get('/books', function () {
    return view('books');
})->name('books.index');

Route::resource('books', BookController::class);


Route::post('/review_new', [ReviewController::class, 'store'])->name('review_new');
Route::get('/review_new', [ReviewController::class, 'create'])->name('review_new');


Route::resource('reviews', ReviewController::class);
Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews');
