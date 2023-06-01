<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Genre;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books', compact('books'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('book_new', compact('genres'));
    }


    public function store(Request $request)
    {
        // $book = new Book();
        // $book->name = $request->name;
        // $book->author = $request->author;
        // $book->release_year = $request->release_year;
        // $book->description = $request->description;
        // $book->page_count = $request->page_count;
        // $book->language = $request->language;
        // $book->genre = $request->genre;
        // $book->photo = $request->photo;
        $book = new Book;
        $book->name = $request->input('name');
        $book->author = $request->input('author');
        $book->release_year = $request->input('release_year');
        $book->description = $request->input('description');
        $book->page_count = $request->input('page_count');
        $book->language = $request->input('language');
        $book->genre_id = $request->input('genre');
        $book->photo = $request->input('photo');
        $book->save();
        $books = Book::all();
        return view('books', compact('books'));
    }
}
