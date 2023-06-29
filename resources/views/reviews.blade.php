@extends('layout')
@section('title', 'Reviews')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('js/edit-review.js') }}"></script>
</head>

<body>
    <div class="review-heading">
        <h3>{{ __('Welcome, book critic') }} 😎</h3>
        <p>{{ __('Here you can see all') }}<b> {{ __('reviews') }}</b></p>
    </div>

    @if (count($reviews) == 0)
    <p class='error'>{{ __('There are no reviews in the database') }}!</p>
    @else
    <div class="reviews">

        <div class="review-list">
            @foreach ($reviews as $review)
            <hr>
            <div class="review">
                <div class="book-info">
                    <b>{{ $review->book->name }}</b> by {{ $review->book->author }}
                </div>
                <div class="review-header">
                    <div class="review-rating">
                        @for ($i = 1; $i <= 5; $i++) @if ($i <=$review->rating)
                            <span class="star-icon filled">&#9733;</span>
                            @else
                            <span class="star-icon">&#9734;</span>
                            @endif
                            @endfor
                            <b>{{ $review->title }}</b>
                    </div>
                </div>
                <div class="review-info">

                    <div class="review-author">by {{ $review->user->name }}</div>
                </div>
                <div class="review-comment">{{ $review->content }}</div>
                @if (auth()->check() && (auth()->user()->role === 1 || $review->user_id === auth()->id()))
                <div class="buttons_show">

                    <a href="{{ route('review.edit', ['id' => $review->id]) }}" class="edit-review-button btn btn-dark btn-sm">{{ __('Edit') }}</a>

                    <form method="POST" action="{{ route('review.delete', ['id' => $review->id]) }}" onsubmit="return confirm('Are you sure you want to delete this review?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-secondary btn-sm">{{ __('Delete') }}</button>
                    </form>
                </div>
                @endif
            </div>
            @endforeach
            <hr>
        </div>
    </div>
    @endif
</body>

</html>

@endsection