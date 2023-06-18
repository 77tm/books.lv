@extends('layout')
@section('title', 'List of books')
@section('content')

<!-- books.create.blade.php -->

<h1>Add Book to Reading List</h1>

<form action="{{ route('reading_list.books.store', ['reading_list' => $readingList]) }}" method="POST">

    @csrf

    <div>
        <label for="book_id">Select a Book:</label>
        <select name="book_id" id="book">
            @foreach ($books as $book)
            <option value="{{ $book->id }}">{{ $book->name }} by {{$book->author}}</option>
            @endforeach
        </select>
    </div>

    <button type="submit">Add Book</button>
</form>


@endsection