@extends('layout')
@section('title', 'Profile')
@section('content')


<head>
    <meta charset="UTF-8">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- <script src="{{ asset('js/search-books.js') }}"></script> -->
</head>


<body>
    <h3>Edit Profile 👷‍♀️</h3>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ auth()->user()->name }}">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ auth()->user()->email }}">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" name="password_confirmation" id="password_confirmation">
        </div>

        <button type="submit" class="btn btn-success">Update Profile</button>
    </form>
</body>

@endsection