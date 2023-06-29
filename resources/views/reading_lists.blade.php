@extends('layout')
@section('title', 'Reading lists')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('js/search-books.js') }}"></script>
</head>

<body>
    <div class="list-container">
        <div class="row">
            <div class="col-md-7 offset-md-2">
                <h2 class="mb-4">{{ __('Discover Quirky, Captivating') }} <b>{{ __('Reading Lists') }} 🦜</b></h2>
                @if (count($reading_lists) == 0)
                <p class="error">{{ __('There are no records in the database') }}!</p>
                @else
                <ul class="list-group">
                    @foreach ($reading_lists as $reading_list)
                    <li class="list-group-item lists">
                        <a href="{{ route('reading_lists.show', $reading_list->id) }}" class="link link-dark">
                            <b>{{ $reading_list->name }}</b> {{ __('by') }} {{ $reading_list->user->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
                @endif

                <button id="add-review-button" class="btn btn-success mt-3">{{ __('New reading list') }}</button>

            </div>
        </div>
    </div>

    <div id="overlay">
        <div id="modal">
            <div class="add-review" id="add-review">
                <h3>
                    {{ __('Create a reading list') }}
                </h3>
                <form method="POST" action="{{ route('list.new') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('Title') }}</label>
                        <textarea name="name" id="name"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">{{ __('Description') }}</label>
                        <textarea name="description" id="description"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">{{ __('Submit') }}</button>
                </form>
            </div>

        </div>
    </div>
</body>

</html>
@endsection