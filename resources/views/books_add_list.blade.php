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
    <div class="home-content-profile">
        <h1>{{ __('Add a') }} <b>{{ __('book') }}</b> {{ __('to your reading list') }} 🚀</h1>

        <div class="login-container">
            <form action="{{ route('reading_list.books.store', ['reading_list' => $readingList]) }}" method="POST" class="mt-4" style="width: 400px">
                @csrf
                <div class="col-md-12">
                    <label for="book_id" class="form-label">{{ __('Choose one from the dropdown menu') }}</label>
                    <select id="book" name="book_id" class="form-select">
                        @foreach ($books as $book)
                        <option value="{{ $book->id }}">{{ $book->name }} by {{$book->author}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="button-container-add">
                    <button type="submit" class="btn btn-dark">{{ __('Update reading list') }}</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
@endsection