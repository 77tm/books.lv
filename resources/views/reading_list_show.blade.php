@extends('layout')
@section('title', 'List of books')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="list-information">
        <h2 class="reading-list-title">{{ $readingList->name }}</h2>
        <h6 class="reading-list-info">{{ __('by') }} {{ $readingList->user->name }}</h6>
        <p class="reading-list-description">{{ $readingList->description }}</p>
    </div>

    @if (count($readingList->books) == 0)
    <div class="no-books-message">
        <h2 class="empty-list-message"><b>{{ __('There are no books in this reading list') }} 🤷‍♂️</b></h2>
    </div>
    @else
    <div class="book-container">
        @foreach ($readingList->books as $book)
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

                <div class="buttons_show">
                    <a href="{{ route('book.show', ['id' => $book->id]) }}" class="btn btn-dark">{{ __('More') }}</a>

                    @if ($readingList->user_id === auth()->id())
                    <form method="POST" action="{{ route('readinglist.books.delete', ['readingListId' => $readingList->id, 'bookId' => $book->id]) }}" id="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove this book from the reading list?')">{{ __('Remove') }}</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
    <hr>
    <div class="buttons_show">
        <div class="list-btns">
            @if ($readingList->user_id === auth()->id())
            <a href="{{ route('reading_list.books_add_list', $readingList) }}" class="btn btn-success">{{ __('Add Books') }}</a>

            <form method="POST" action="{{ route('readinglist.destroy', ['id' => $readingList->id]) }}" id="delete-form">
                @csrf
                @method('DELETE')
                <button class="btn btn-link text-dark" type="submit" onclick="return confirm('Are you sure you want to delete this reading list?')">{{ __('Delete reading list') }}</button>
            </form>
            @else
        </div>
        <p class="created-by">{{ __('Created by') }}: {{ $readingList->user->name }}</p>
        @endif
    </div>
</body>

</html>
@endsection