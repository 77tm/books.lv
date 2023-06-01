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
}
