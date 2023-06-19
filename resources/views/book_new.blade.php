@extends('layout')
@section('title', 'Login')
@section('content')
book page

<form method="POST" action={{ action([App\Http\Controllers\BookController::class, 'store']) }} enctype="multipart/form-data">
    @csrf

    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
    </div>

    <div>
        <label for="author">Author:</label>
        <input type="text" name="author" id="author">
    </div>

    <div>
        <label for="release_year">Release Year:</label>
        <input type="number" name="release_year" id="release_year">
    </div>

    <div>
        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea>
    </div>

    <div>
        <label for="page_count">Page Count:</label>
        <input type="number" name="page_count" id="page_count">
    </div>

    <div>
        <label for="language">Language:</label>
        <input type="text" name="language" id="language">
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
    </div>

    <button type="submit">Submit</button>
</form>

@endsection