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
        $review->title = htmlspecialchars($request->title);
        $review->content = htmlspecialchars($request->content);
        $review->save();

        $reviews = Review::all();
        return view('reviews', compact('reviews'));
    }


    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view('review_edit')->with('review', $review);
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:255',
        ]);

        // Find the review
        $review = Review::findOrFail($id);

        // Update the review with the new data
        $review->rating = $validatedData['rating'];
        $review->title = htmlspecialchars($validatedData['title']);
        $review->content = htmlspecialchars($validatedData['content']);
        $review->save();

        $reviews = Review::all();
        return view('reviews', compact('reviews'));
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('reviews')->with('success', 'Review deleted successfully');
    }
}
