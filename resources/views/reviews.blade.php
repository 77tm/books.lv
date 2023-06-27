<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('js/edit-review.js') }}"></script>
</head>

<body>
    @extends('layout')
    @section('title', 'Login')
    @section('content')
    <h1>These are all the reviews</h1>
    @if (count($reviews) == 0)
    <p class='error'>There are no records in the database!</p>
    @else
    <ul>
        @foreach ($reviews as $review)
        <li>
            {{ $review->user->name }} - {{ $review->book->name }} by {{$review->book->author}} - {{ $review->rating }} - {{ $review->title }} - {{ $review->content }}
            @if ($review->user_id === auth()->id())
            <div class="buttons_show">
                <button class="edit-review-button btn btn-success" data-review-id="{{ $review->id }}">Edit</button>
                <form method="POST" action="{{ route('review.delete', ['id' => $review->id]) }}" onsubmit="return confirm('Are you sure you want to delete this review?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
            @endif
        </li>
        @endforeach
    </ul>
    @endif

    @foreach ($reviews as $review)
    <div id="overlay-{{ $review->id }}">
        <div class="modal">
            <div class="edit-review-show" id="edit-review-{{ $review->id }}">
                <h3>Edit Review</h3>
                <form method="POST" action="{{ route('review.update', ['id' => $review->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="rating">Rating:</label>
                        <select name="rating" id="rating">
                            <option value="1" {{ $review->rating == 1 ? 'selected' : '' }}>1 star</option>
                            <option value="2" {{ $review->rating == 2 ? 'selected' : '' }}>2 stars</option>
                            <option value="3" {{ $review->rating == 3 ? 'selected' : '' }}>3 stars</option>
                            <option value="4" {{ $review->rating == 4 ? 'selected' : '' }}>4 stars</option>
                            <option value="5" {{ $review->rating == 5 ? 'selected' : '' }}>5 stars</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" value="{{ $review->title }}">
                    </div>
                    <div class="form-group">
                        <label for="content">Content:</label>
                        <textarea name="content" id="content">{{ $review->content }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    @endsection
</body>

</html>