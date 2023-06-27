@extends('layout')
@section('title', 'List of books')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- <script src="{{ asset('js/search-books.js') }}"></script> -->
</head>

<body>
    <h1>Our book collection</h1>

    <!-- <div class="search-container">
        <label for="search-input">Search by Book Name:</label>
        <input type="text" id="search-input" name="search" placeholder="Enter book name">
        <ul id="search-results"></ul>
    </div> -->


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

                    <h3><b>{{ $book->name }}</b></h3>
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

    <div class="genre-search">
        <form method="GET" action="{{ route('books.index') }}">
            <div class="form-group">
                <label for="genre">Search by Genre:</label>
                <select name="genre" id="genre" class="form-control">
                    <option value="">All Genres</option>
                    @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-dark">Search</button>
        </form>
    </div>


</body>

</html>
@endsection