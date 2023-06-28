<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReadingList;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;

class ReadingListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reading_lists = ReadingList::all();
        return view('reading_lists', compact('reading_lists'));
    }

    public function profileIndex()
    {
        $reading_lists = auth()->user()->reading_lists;
        return view('reading_lists', compact('reading_lists'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reading_list_new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reading_list = new ReadingList();
        $reading_list->user_id = Auth::id();
        $reading_list->name = $request->name;
        $reading_list->description = $request->description;
        $reading_list->save();

        $reading_lists = ReadingList::all();
        return view('reading_lists', compact('reading_lists'));
    }

    public function createBook(ReadingList $readingList)
    {
        // Check if the authenticated user owns the reading list
        if ($readingList->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
        $books = Book::all();
        // Pass the reading list to the view
        return view('books_add_list', compact('readingList', 'books'));
    }

    public function storeBook(Request $request, ReadingList $readingList)
    {
        // Check if the authenticated user owns the reading list
        if ($readingList->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        // Validate the request data
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        // Check if the book is already added to the reading list
        if ($readingList->books()->where('book_id', $request->book_id)->exists()) {
            return redirect()->route('reading_lists.show', $readingList)->with('error', 'Book is already added to the reading list.');
        }

        // Attach the book to the reading list
        $readingList->books()->attach($request->book_id);

        // Redirect back to the reading list with a success message
        return redirect()->route('reading_lists.show', $readingList)->with('success', 'Book added to the reading list.');
    }


    public function addList(Request $request, $id)
    {
        // Find the book
        $book = Book::findOrFail($id);

        // Get the authenticated user
        $user = auth()->user();

        // Get the selected reading lists
        $selectedLists = $request->input('reading_lists', []);

        // Add the book to the selected reading lists
        foreach ($selectedLists as $listId) {
            $readingList = ReadingList::where('user_id', $user->id)->findOrFail($listId);
            $readingList->books()->attach($book->id);
        }

        return redirect()->route('book.show', ['id' => $id])->with('success', 'Book added to reading list successfully.');
    }

    public function newList(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);


        $readingList = new ReadingList();
        $readingList->user_id = Auth::id();

        $readingList->name = $validatedData['name'];
        $readingList->description = $validatedData['description'];
        // You may need to set the user ID or any other relevant fields here

        // Save the reading list
        $readingList->save();

        // Optionally, you can redirect the user to the reading list show page
        return redirect()->route('reading_lists.show', $readingList->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($readingListId)
    {
        $readingList = ReadingList::with('books')->findOrFail($readingListId);
        return view('reading_list_show', compact('readingList'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $readingList = ReadingList::findOrFail($id);
        $readingList->delete();

        return redirect()->route('reading_lists')->with('success', 'Reading list deleted successfully');
    }


    public function deleteBook($readingListId, $bookId)
    {
        $readingList = ReadingList::findOrFail($readingListId);
        $book = Book::findOrFail($bookId);

        // Remove the book from the reading list
        $readingList->books()->detach($book->id);

        $readingList = ReadingList::with('books')->findOrFail($readingListId);
        return view('reading_list_show', compact('readingList'));
    }
}
