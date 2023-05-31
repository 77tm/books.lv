<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books', compact('books'));
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
        $book->genre = $request->input('genre');
        $book->photo = $request->input('photo');
        $book->save();
        // return view('books');
        $books = Book::all();
        return view('books', compact('books'));
        // $photoUrl = '';

        // if ($request->hasFile('photo')) {
        //     $photoPath = $request->file('photo')->store('photos', 'uploads');
        //     $validatedData['photo'] = $photoPath;
        // }

        // Save the book to the database
        // $book = Book::create($validatedData);




        // Retrieve the public URL for the photo
        // if (isset($book->photo)) {
        //     $photoUrl = asset('uploads/' . $book->photo);
        // }

        #to perform a redirect back, we need country code from ID
        // $country = Country::findOrFail($request->country_id);
        // $action = action([ManufacturerController::class, 'index'], ['countryslug' => $country->code]);
        // return redirect($action);
    }
}
