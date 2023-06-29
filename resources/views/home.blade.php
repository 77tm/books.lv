@extends('layout')
@section('title', "Home")
@section('content')

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="video-container">
        <video autoplay loop muted>
            <source src="{{ asset('uploads/background_video6.mp4') }}" type="video/mp4">
        </video>
    </div>
    <div class="home-content">
        <h1><b>{{ __('Login') }}</b> {{ __('and get lost in the literary') }}<br> {{ __('wonders') }} 🔮 </h1>

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
            <form action="{{route('login.post')}}" method="POST" class="mt-4" style="width: 300px">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email address') }}</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="button-container">

                    <button type="submit" class="btn btn-dark">{{ __('Login') }}</button>
                    <a href="{{ route('registration') }}" class="button link-dark">{{ __('Register') }}</a>

                </div>
            </form>
        </div>
    </div>

</body>

</html>
@endsection