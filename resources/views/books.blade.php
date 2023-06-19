@extends('layout')
@section('title', 'List of books')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <h1>Pick a book you like</h1>
    @if (count($books) == 0)
    <p class='error'>There are no records in the database!</p>
    @else
    <ul>
        <div class="book-container">

            @foreach ($books as $book)
            <!-- <li>
            {{ $book->name }} - {{ $book->author }} - {{ $book->release_year }} - {{ $book->description }} - {{ $book->page_count }}
            - {{ $book->language }} - {{ $book->genre->name }} - <img src="{{ $book->photo }}" alt="Book Photo">

             </li> -->
            <!-- Book Card 1 -->
            <div class="card">

                @if ($book->photo)
                <!-- <img src="{{ asset('uploads/book-photo/Grad_02.png') }}" alt="Book Image"> -->
                <img src="{{ asset('/storage/storage/uploads/' . $book->photo) }}" alt="Book Image">
                @else
                <img src="/uploads/no-image.png" alt="Book Image">
                @endif


                <div class="book-details">

                    <h3>{{ $book->name }}</h3>
                    <p>Author: {{ $book->author }}</p>
                    <p>Release Date: {{ $book->release_year }}</p>
                    <a href="{{ route('book.show', ['id' => $book->id]) }}" class="show-more-btn">Show More</a>
                </div>
            </div>

            @endforeach
            <!-- Repeat the structure for other book cards -->
        </div>
        <!-- <div class="book-container">
            <div class="card">
                <h5 class="card-title">{{ $book->name }}</h5>
                <p class="card-text">{{ $book->author }}</p>
                <a href="#" class="btn btn-primary">Read More</a>
            </div>
            <div class="card">
                <h5 class="card-title">{{ $book->name }}</h5>
                <p class="card-text">{{ $book->author }}</p>
                <a href="#" class="btn btn-primary">Read More</a>
            </div>
            <div class="card">Book 3</div>
            <div class="card">Book 4</div>
            <div class="card">Book 5</div> -->
        <!-- Add more book cards here -->
        </div>




    </ul>
    @endif
</body>

</html>
@endsection