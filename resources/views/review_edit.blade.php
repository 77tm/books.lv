@extends('layout')
@section('title', 'Edit Review')
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
        <h1>{{ __('Edit') }} <b>{{ __('Review') }}</b> 📝</h1>

        <form action="{{ route('review.update', ['id' => $review->id]) }}" method="POST" class="mt-4" style="width: 400px">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="rating" class="form-label">{{ __('Rating') }}</label>
                <select name="rating" id="rating" class="form-control">
                    @for ($i = 1; $i <= 5; $i++) <option value="{{ $i }}" {{ $i == $review->rating ? 'selected' : '' }}>{{ $i }} star{{ $i > 1 ? 's' : '' }}</option>
                        @endfor
                </select>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">{{ __('Title') }}</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $review->title }}">
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">{{ __('Comment') }}</label>
                <textarea name="content" id="content" class="form-control">{{ $review->content }}</textarea>
            </div>

            <button type="submit" class="btn btn-dark">{{ __('Update Review') }}</button>
        </form>
    </div>
</body>

</html>
@endsection