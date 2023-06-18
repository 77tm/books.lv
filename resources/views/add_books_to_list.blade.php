@extends('layout')
@section('title', 'Login')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <h1>Add a book</h1>
    <form action="{{ route('reading_lists.add_book', $readingList->id) }}" method="POST">
        @csrf
        <select name="book_id">
            @foreach ($books as $book)
            <option value="{{ $book->id }}">{{ $book->title }}</option>
            @endforeach
        </select>
        <button type="submit">Add Book</button>
    </form>

    @endif
</body>

</html>
@endsection