<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\Genre;
use App\Models\Review;
use App\Models\ReadingList;


class BookController extends Controller
{
    public function index(Request $request)
    {
        $genres = Genre::all();
        $query = Book::query();

        if ($request->has('genre')) {
            $genreId = $request->input('genre');
            if ($genreId) {
                $query->where('genre_id', $genreId);
            }
        }

        $books = $query->get();

        return view('books', compact('books', 'genres'));
    }


    public function create()
    {
        $genres = Genre::all();
        return view('book_new', compact('genres'));
    }


    public function store(Request $request)
    {
        $genres = Genre::all();

        $book = new Book;
        $book->name = htmlspecialchars($request->input('name'));
        $book->author = htmlspecialchars($request->input('author'));
        $book->release_year = htmlspecialchars($request->input('release_year'));
        $book->description = htmlspecialchars($request->input('description'));
        $book->page_count = htmlspecialchars($request->input('page_count'));
        $book->language = htmlspecialchars($request->input('language'));
        $book->genre_id = htmlspecialchars($request->input('genre'));

        $uploadedImage = $request->file('photo');

        if ($uploadedImage) {
            // Generate a unique filename
            $filename = uniqid() . '.' . $uploadedImage->getClientOriginalExtension();

            // Store the image
            $uploadedImage->storeAs('storage/uploads/', $filename, 'public');

            // Save the image filename in the book record
            $book->photo = $filename;
        }

        $book->save();

        $books = Book::all();
        return view('books', compact('books', 'genres'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        $readingLists = ReadingList::where('user_id', auth()->id())->get();

        return view('book.show', compact('book', 'readingLists'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $book->name = htmlspecialchars($request->input('name'));
        $book->author = htmlspecialchars($request->input('author'));
        $book->release_year = htmlspecialchars($request->input('release_year'));
        $book->description = htmlspecialchars($request->input('description'));
        $book->page_count = htmlspecialchars($request->input('page_count'));
        $book->language = htmlspecialchars($request->input('language'));
        $book->genre_id = htmlspecialchars($request->input('genre'));

        if ($request->hasFile('photo')) {
            $uploadedImage = $request->file('photo');

            // Generate a unique filename
            $filename = uniqid() . '.' . $uploadedImage->getClientOriginalExtension();

            // Store the image
            $uploadedImage->storeAs('storage/uploads/', $filename, 'public');

            // Save the image filename in the book record
            $book->photo = $filename;
        }

        $book->save();
        return redirect()->route('book.show', ['id' => $book->id])->with('success', 'Book updated successfully');
    }

    public function addReview(Request $request, $id)
    {
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
        ]);

        // Find the book
        $book = Book::findOrFail($id);

        // Create a new review for the book
        $review = new Review();
        $review->user_id = Auth::id();
        $review->book_id = $book;

        $review->rating = htmlspecialchars($validatedData['rating']);
        $review->title = htmlspecialchars($validatedData['title']);
        $review->content = htmlspecialchars($validatedData['content']);

        // Associate the review with the book
        $book->reviews()->save($review);

        // Redirect back to the book's show page
        return redirect()->back()->with('success', 'Review added successfully.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}
