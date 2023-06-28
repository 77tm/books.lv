@extends('layout')
@section('title', 'Books')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- <script src="{{ asset('js/search-books.js') }}"></script> -->
</head>

<body class="books-body">

    @if (count($books) == 0)
    <p class='error'>{{ __('There are no records in the database!') }}</p>
    @else
    <ul>
        <div class="book-container">

            @foreach ($books as $book)

            <div class="card shadow">

                @if ($book->photo)

                <img src="{{ asset('/storage/storage/uploads/' . $book->photo) }}" alt="Book Image">
                @else
                <img src="/uploads/no-image.png" alt="Book Image">
                @endif

                <div class="book-details">

                    <h3><b>{{ $book->name }}</b></h3>
                    <p>{{ __('Author') }}: {{ $book->author }}</p>
                    <p>{{ __('Release Year') }}: {{ $book->release_year }}</p>
                    <a href="{{ route('book.show', ['id' => $book->id]) }}" class="show-more-btn">{{ __('Show More') }}</a>
                </div>
            </div>
            @endforeach
        </div>
    </ul>
    @endif

    <div class="genre-search">
        <form method="GET" action="{{ route('books.index') }}">
            <div class="form-group">
                <label for="genre">{{ __('Search by Genre') }}:</label>
                <select name="genre" id="genre" class="form-control">
                    <option value="">{{ __('All Genres') }}</option>
                    @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-dark">{{ __('Search') }}</button>
        </form>
    </div>


</body>

</html>
@endsection