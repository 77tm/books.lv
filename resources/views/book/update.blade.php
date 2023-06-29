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
    <form method="POST" action="{{ route('book.update', ['id' => $book->id]) }}" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ $book->name }}">
        </div>

        <div>
            <label for=" author">Author:</label>
            <input type="text" name="author" id="author" value="{{ $book->author }}">
        </div>

        <div>
            <label for="release_year">Release Year:</label>
            <input type="number" name="release_year" id="release_year" value="{{ $book->release_year }}">
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description">{{ $book->description }}</textarea>
        </div>

        <div>
            <label for="page_count">Page Count:</label>
            <input type="number" name="page_count" id="page_count" value="{{ $book->page_count }}">
        </div>

        <div>
            <label for="language">Language:</label>
            <input type="text" name="language" id="language" value="{{ $book->language }}">
        </div>

        <div>
            <label for="language">Genre:</label>
            <select name="genre">
                @foreach ($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="photo">Photo:</label>
            <input type="file" name="photo" id="photo">
            @if ($book->photo)

            <img src="{{ asset('/storage/storage/uploads/' . $book->photo) }}" alt="Book Image">
            @else
            <img src="/uploads/no-image.png" alt="Book Image">
            @endif
        </div>
        <button type="submit">Update</button>
    </form>
</body>

</html>
@endsection