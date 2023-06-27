<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReadingListController;
use App\Models\Book;
use App\Models\Genre;


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


Route::get('/reading_list_new', [ReadingListController::class, 'create'])->name('reading_list_new');
Route::post('/reading_list_new', [ReadingListController::class, 'store'])->name('reading_list.store');

Route::resource('reading_lists', ReadingListController::class);
Route::get('/reading_lists', [ReadingListController::class, 'index'])->name('reading_lists');

Route::get('/reading_lists/{reading_list}', [ReadingListController::class, 'show'])->name('reading_lists.show');


Route::get('/reading_lists/{reading_list}/books/create', [ReadingListController::class, 'createBook'])
    ->name('reading_list.books_add_list');

Route::post('/reading_list/{reading_list}/books', [ReadingListController::class, 'storeBook'])->name('reading_list.books.store');

Route::get('/books/{id}', [App\Http\Controllers\BookController::class, 'show'])->name('book.show');


Route::match(['get', 'put'], '/books/{id}/update', function ($id) {
    $book = Book::findOrFail($id);
    $genres = Genre::all();

    return view('book.update', compact('book', 'genres'));
})->name('book.update');

Route::put('/books/{id}/update', [App\Http\Controllers\BookController::class, 'update'])->name('book.update');

Route::delete('/books/{id}', [App\Http\Controllers\BookController::class, 'destroy'])->name('book.delete');


Route::delete('/reading_lists/{id}', [App\Http\Controllers\ReadingListController::class, 'destroy'])->name('readinglist.destroy');


Route::delete('/reading_lists/{readingListId}/books/{bookId}', [App\Http\Controllers\ReadingListController::class, 'deleteBook'])->name('readinglist.books.delete');

Route::post('/books/{id}/add-review', [BookController::class, 'addReview'])->name('book.addReview');

Route::get('/profile/edit', [AuthManager::class, 'editProfile'])->name('profile.edit');
Route::put('/profile/update', [AuthManager::class, 'updateProfile'])->name('profile.update');

Route::get('/profile/reading-lists', [ReadingListController::class, 'profileIndex'])->name('profile.reading_lists');

Route::get('/profile/reviews', [ReviewController::class, 'userReviews'])->name('profile.reviews');
Route::delete('/reviews/{id}/delete', [App\Http\Controllers\ReviewController::class, 'destroy'])->name('review.delete');


Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('review.update');
