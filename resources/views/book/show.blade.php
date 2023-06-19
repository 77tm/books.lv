@extends('layout')
@section('title', 'List of books')
@section('content')

{{ $book->name }} - {{ $book->author }} - {{ $book->release_year }} - {{ $book->description }} - {{ $book->page_count }}
- {{ $book->language }} - {{ $book->genre->name }} - <img src="{{ $book->photo }}" alt="Book Photo">

<!-- <form method="POST" action="{{ route('book.update', ['id' => $book->id]) }}">
    @csrf
    @method('PUT')
    <button type="submit">Edit</button>
</form> -->

<a href="{{ route('book.update', ['id' => $book->id]) }}" class="show-more-btn">Edit</a>

@endsection