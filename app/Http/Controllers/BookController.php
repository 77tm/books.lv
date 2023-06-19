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
        $book = new Book;
        $book->name = $request->input('name');
        $book->author = $request->input('author');
        $book->release_year = $request->input('release_year');
        $book->description = $request->input('description');
        $book->page_count = $request->input('page_count');
        $book->language = $request->input('language');
        $book->genre_id = $request->input('genre');

        $uploadedImage = $request->file('photo');

        // Generate a unique filename
        $filename = uniqid() . '.' . $uploadedImage->getClientOriginalExtension();

        // Store the image in the desired location
        $uploadedImage->storeAs('storage/uploads/', $filename, 'public');

        // Save the image filename in the book record
        $book->photo = $filename;
        $book->save();

        $books = Book::all();
        return view('books', compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('book.show', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->name = $request->input('name');
        $book->author = $request->input('author');
        $book->release_year = $request->input('release_year');
        $book->description = $request->input('description');
        $book->page_count = $request->input('page_count');
        $book->language = $request->input('language');
        $book->genre_id = $request->input('genre');

        if ($request->hasFile('photo')) {
            $uploadedImage = $request->file('photo');

            // Generate a unique filename
            $filename = uniqid() . '.' . $uploadedImage->getClientOriginalExtension();

            // Store the image in the desired location
            $uploadedImage->storeAs('storage/uploads/', $filename, 'public');

            // Save the image filename in the book record
            $book->photo = $filename;
        }

        $book->save();

        return redirect()->route('book.show', ['id' => $book->id])->with('success', 'Book updated successfully');
    }
}
