@extends('layout')
@section('title', 'Add a book')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body class="book-new-body">
    <div class="book-new-container">
        <div class="book-new-form">

            <h3><b>{{ __('Add a book') }}</b> {{ __('to the collection') }} 📖</h3>

            <!-- Display validation errors if any -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form class="row g-3 form-floating" method="POST" action="{{ action([App\Http\Controllers\BookController::class, 'store']) }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Title" required>
                        <label for="name">{{ __('Title') }}</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="author" name="author" placeholder="Author" required>
                        <label for="author">{{ __('Author') }}</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="release_year" name="release_year" placeholder="Release Year" required min="1" max="{{ date('Y') }}">
                        <label for="release_year">{{ __('Release Year') }}</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <textarea class="form-control" id="description" name="description" placeholder="Description" rows="3" required></textarea>
                        <label for="description">{{ __('Description') }}</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="number" class="form-control" id="page_count" name="page_count" placeholder="Page Count" required min="1">
                        <label for="page_count">{{ __('Page Count') }}</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="language" name="language" placeholder="Language" required>
                        <label for="language">{{ __('Language') }}</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <select id="genre" class="form-select" name="genre" placeholder="Genre" required>
                            @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                            @endforeach
                        </select>
                        <label for="genre">{{ __('Genre') }}</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="file" class="form-control" id="photo" name="photo" placeholder="Photo">
                        <label for="photo">{{ __('Photo') }}</label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-dark">{{ __('Submit') }}</button>
                </div>
            </form>

        </div>
        <div class="new-book-img">
            <img src="uploads/book-cover3.jpeg" alt="Image" class="img-fluid">
        </div>
    </div>

</body>

</html>
@endsection