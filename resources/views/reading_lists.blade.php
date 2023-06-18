@extends('layout')
@section('title', 'Login')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
</head>

<body>
    <h1>These are all the reading lists</h1>
    @if (count($reading_lists) == 0)
    <p class='error'>There are no records in the database!</p>
    @else
    <ul>

        @foreach ($reading_lists as $reading_list)
        <li>
            <a href="{{ route('reading_lists.show', $reading_list->id) }}">{{ $reading_list->name }} by {{ $reading_list->user->name }} - {{ $reading_list->description }}</a>


        </li>
        @endforeach

    </ul>
    @endif
</body>

</html>
@endsection