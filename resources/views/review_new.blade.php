@extends('layout')
@section('title', 'Login')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form class="w-1/2" method="POST" action={{ action([App\Http\Controllers\ReviewController::class, 'store']) }}>
        @csrf
        <div class="form-group">
            <label for="book_id">Book:</label>
            <select name="book_id" id="book_id" class="form-control">
                @foreach($books as $book)
                <option value="{{ $book->id }}">{{ $book->name }} by {{ $book->author }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="rating">Rating:</label>
            <input type="number" name="rating" id="rating" class="form-control" min="1" max="5">
        </div>

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" id="content" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>
@endsection