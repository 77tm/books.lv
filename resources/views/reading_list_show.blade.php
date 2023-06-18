@extends('layout')
@section('title', 'List of books')
@section('content')

<h1>{{ $readingList->name }}</h1>
<p>{{ $readingList->description }}</p>





<!-- Display the list of books in the reading list -->
<h2>Books in the Reading List:</h2>
<ul>
    @foreach ($readingList->books as $book)
    <li>{{ $book->name }} by {{ $book->author }}</li>
    @endforeach
</ul>

@if ($readingList->user_id === auth()->id())
<!-- Button to Add Books -->
<a href="{{ route('reading_list.books_add_list', $readingList) }}">Add Books</a>
@else
<!-- Display the name of the reading list creator -->
<p>Created by: {{ $readingList->user->name }}</p>
@endif



@endsection