@extends('layout')
@section('title', 'Profile')
@section('content')


<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>


<body class="profile-body">


    <div class="home-content-profile">

        <h1><b>{{ __('Change') }}</b> {{ __('user information') }} 👷‍♀️</h1>

        <div class="login-container">
            <div class="mt-2">
                @if($errors->any())
                <div class="col-8">
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                </div>
                @endif

                @if(session()->has('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
                @endif

                @if(session()->has('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
            </div>
            <form method="POST" action="{{ route('profile.update') }}" class="mt-4" style="width: 400px">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('New password') }}</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">{{ __('Confirm new password') }}</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>

                <div class="button-container">

                    <button type="submit" class="btn btn-dark">{{ __('Update Profile') }}</button>
            </form>

            <form action="{{ route('profile.delete', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-link text-dark">{{ __('Delete Account') }}</button>
            </form>







        </div>

    </div>
</body>

@endsection