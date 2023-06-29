@extends('layout')
@section('title', "Home")
@section('content')

<!DOCTYPE html>
<html lang="en">

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
        <h1><b>{{ __('Register') }}</b> {{ __('and uncover bookworm') }} <br>{{ __("kingdom's hidden passages") }} 🦄</h1>

        <div class="container">
            <div class="mt-2">
                @if($errors->any())
                <div class="col-6">
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
            <form action="{{route('registration.post')}}" method="POST" class=" mt-4" style="width: 300px">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Full name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" minlength="1">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email address') }}</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input type="password" class="form-control" id="password" name="password" minlength="7">
                </div>
                <button type="submit" class="btn btn-dark">{{ __('Submit') }}</button>
            </form>
        </div>
    </div>
</body>

</html>
@endsection