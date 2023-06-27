<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;

class ReviewController extends Controller
{

    public function index()
    {
        $reviews = Review::all();
        return view('reviews', compact('reviews'));
    }

    public function userReviews()
    {
        $user = auth()->user();
        $reviews = $user->reviews;
        return view('reviews', compact('reviews'));
    }


    public function create()
    {
        $books = Book::all();
        return view('review_new', compact('books'));
    }


    public function store(Request $request)
    {
        $review = new Review();
        $review->user_id = Auth::id();
        $review->book_id = $request->book_id;
        $review->rating = $request->rating;
        $review->title = $request->title;
        $review->content = $request->content;
        $review->save();

        $reviews = Review::all();
        return view('reviews', compact('reviews'));
    }


    public function update(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
        ]);

        // Find the review
        $review = Review::findOrFail($id);

        // Update the review with the new data
        $review->rating = $validatedData['rating'];
        $review->title = $validatedData['title'];
        $review->content = $validatedData['content'];
        $review->save();

        // Redirect back to the book's show page or wherever needed
        return redirect()->back()->with('success', 'Review updated successfully.');
    }





    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('reviews')->with('success', 'Review deleted successfully');
    }
}
