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

            <h3><b>{{ __('Update') }}</b> {{ __('book info') }} 📖</h3>

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

            <form class="row g-3 form-floating" method="POST" action="{{ route('book.update', ['id' => $book->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-12">
                    <div class="form-floating">
                        <input value="{{ $book->name }}" type="text" class="form-control" id="name" name="name" required>
                        <label for=" name">{{ __('Title') }}</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input value="{{ $book->author }}" type="text" class="form-control" id="author" name="author" placeholder="Author" required>
                        <label for="author">{{ __('Author') }}</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input value="{{ $book->release_year }}" type="number" class="form-control" id="release_year" name="release_year" placeholder="Release Year" required min="1" max="{{ date('Y') }}">
                        <label for="release_year">{{ __('Release Year') }}</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <textarea class="form-control" id="description" name="description" placeholder="Description" rows="3" required>{{ $book->description }}</textarea>
                        <label for="description">{{ __('Description') }}</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input value="{{ $book->page_count }}" type="number" class="form-control" id="page_count" name="page_count" placeholder="Page Count" required min="1">
                        <label for="page_count">{{ __('Page Count') }}</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <input value="{{ $book->language }}" type="text" class="form-control" id="language" name="language" placeholder="Language" required>
                        <label for="language">{{ __('Language') }}</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-floating">
                        <select id="genre" class="form-select" name="genre" placeholder="Genre" required>
                            @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}" @if ($genre->id == $book->genre->id) selected @endif>{{ $genre->name }}</option>
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
        <div class="edit-book-img">
            @if ($book->photo)

            <img src="{{ asset('/storage/storage/uploads/' . $book->photo) }}" alt="Book Image">
            @else
            <img src="/uploads/no-image.png" alt="Book Image">
            @endif
        </div>
    </div>

</body>

</html>
@endsection