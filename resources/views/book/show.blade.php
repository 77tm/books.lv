@extends('layout')
@section('title', 'Book Details')
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
    <div class="book-details_show">
        <div class="book-photo_show">
            @if ($book->photo)
            <img src="{{ asset('/storage/storage/uploads/' . $book->photo) }}" alt="Book Image">
            @else
            <img src="/uploads/no-image.png" alt="Book Image">
            @endif
        </div>
        <div class="book-info_show">
            <h2>{{ $book->name }}</h2>
            <p>{{ __('Author') }}: {{ $book->author }}</p>
            <p>{{ __('Release Year') }}: {{ $book->release_year }}</p>
            <p>{{ __('Description') }}: {{ $book->description }}</p>
            <p>{{ __('Page Count') }}: {{ $book->page_count }}</p>
            <p>{{ __('Language') }}: {{ $book->language }}</p>
            <p>{{ __('Genre') }}: {{ $book->genre->name }}</p>

            <div class="buttons_show">
                @if (Auth::user()->role == 1)
                <a href="{{ route('book.update', ['id' => $book->id]) }}" class="btn btn-dark">{{ __('Edit') }}</a>

                <form method="POST" action="{{ route('book.delete', ['id' => $book->id]) }}" onsubmit="return confirm('Are you sure you want to delete this book?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-light">{{ __('Delete') }}</button>
                </form>
                @endif

                <button id="add-review-button" class="btn btn-success">{{ __('Add Review') }}</button>
            </div>
        </div>
    </div>

    <div class="reviews">
        <h3 class="rev">{{ __('Reviews') }}</h3>
        <div class="review-list">
            @if ($book->reviews->count() > 0)
            @foreach ($book->reviews as $review)
            <hr>

            <div class="review">
                <div class="review-header">
                    <div class="review-rating">
                        <!-- Rating: -->
                        @for ($i = 1; $i <= 5; $i++) @if ($i <=$review->rating)
                            <span class="star-icon filled">&#9733;</span>
                            @else
                            <span class="star-icon">&#9734;</span>
                            @endif
                            @endfor
                            <b>{{ $review->title }}</b>
                    </div>
                </div>
                <div class="review-author">{{ __('by') }} {{ $review->user->name }}</div>
                <div class="review-comment">{{ $review->content }}</div>
            </div>

            @endforeach
            <hr>
            @else
            <p>No reviews yet.</p>
            @endif

            <div id="overlay">
                <div id="modal">
                    <div class="add-review" id="add-review">
                        <h3>{{ __('Add a review') }}</h3>
                        <form method="POST" action="{{ route('book.addReview', ['id' => $book->id]) }}">
                            @csrf
                            <div class="form-group">
                                <label for="rating">{{ __('Rating') }}:</label>
                                <select name="rating" id="rating">
                                    <option value="1">1 {{ __('star') }}</option>
                                    <option value="2">2 {{ __('stars') }}</option>
                                    <option value="3">3 {{ __('stars') }}</option>
                                    <option value="4">4 {{ __('stars') }}</option>
                                    <option value="5">5 {{ __('stars') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">{{ __('Title') }}:</label>
                                <textarea name="title" id="title"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="content">{{ __('Comment') }}:</label>
                                <textarea name="content" id="content"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">{{ __('Submit') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
@endsection