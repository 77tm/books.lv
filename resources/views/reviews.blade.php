@extends('layout')
@section('title', 'Login')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <h1>These are all the reviews</h1>
    @if (count($reviews) == 0)
    <p class='error'>There are no records in the database!</p>
    @else
    <ul>

        @foreach ($reviews as $review)
        <li>
            {{ $review->user->name }} - {{ $review->book->name }} by {{$review->book->author}} - {{ $review->rating }} - {{ $review->title }} - {{ $review->content }}

        </li>
        @endforeach

    </ul>
    @endif
</body>

</html>
@endsection