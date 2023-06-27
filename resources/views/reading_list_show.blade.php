@extends('layout')
@section('title', 'List of books')
@section('content')

<h1>{{ $readingList->name }}</h1>
<p>{{ $readingList->description }}</p>





<!-- Display the list of books in the reading list -->
<h2>Books in the Reading List:</h2>
<!-- <ul>
    @foreach ($readingList->books as $book)
    <li>{{ $book->name }} by {{ $book->author }}</li>
    @endforeach
</ul> -->

@if ($readingList->user_id === auth()->id())
<!-- Button to Add Books -->


<ul>

    @foreach ($readingList->books as $book)
    <div>
        <!-- Display book details -->

        <li>{{ $book->name }} by {{ $book->author }}</li>

        <!-- Delete button with confirmation prompt -->
        <form method="POST" action="{{ route('readinglist.books.delete', ['readingListId' => $readingList->id, 'bookId' => $book->id]) }}" id="delete-form">
            @csrf
            @method('DELETE')

            <button type="submit" onclick="return confirm('Are you sure you want to remove this book from the reading list?')">Remove</button>
        </form>
    </div>
    @endforeach
</ul>


<a href="{{ route('reading_list.books_add_list', $readingList) }}">Add Books</a>

<form method="POST" action="{{ route('readinglist.destroy', ['id' => $readingList->id]) }}" id="delete-form">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Are you sure you want to delete this reading list?')">Delete</button>
</form>

@else
<ul>
    @foreach ($readingList->books as $book)
    <li>{{ $book->name }} by {{ $book->author }}</li>
    @endforeach
</ul>
<!-- Display the name of the reading list creator -->
<p>Created by: {{ $readingList->user->name }}</p>
@endif



@endsection