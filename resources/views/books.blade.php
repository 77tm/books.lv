@extends('layout')
@section('title', 'List of books')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <h1>Pick a book you like</h1>
    @if (count($books) == 0)
    <p class='error'>There are no records in the database!</p>
    @else
    <ul>

        @foreach ($books as $book)
        <li>
            {{ $book->name }} - {{ $book->author }} - {{ $book->release_year }} - {{ $book->description }} - {{ $book->page_count }}
            - {{ $book->language }} - {{ $book->genre->name }} - <img src="{{ $book->photo }}" alt="Book Photo">

        </li>
        @endforeach

    </ul>
    @endif
</body>

</html>
@endsection