</div>
@extends('layout')
@section('title', "Home")
@section('content')

<!DOCTYPE html>
<html>

<head>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

    <div class="video-container">
        <video autoplay loop muted>
            <source src="{{ asset('uploads/background_video6.mp4') }}" type="video/mp4">
            <!-- Add additional <source> elements for other video formats if necessary -->
        </video>
        <!-- <div class="video-overlay"></div> -->
    </div>
    <div class="home-content">
        <!-- <h1>Join the fastest growing book club</h1> -->
        <!-- <h1>Register and discover the secret passages <br>of the bookworm kingdom! 🚪📚</h1> -->
        <h1><b>{{ __('Register') }}</b> {{ __('and uncover bookworm') }} <br>{{ __("kingdom's hidden passages") }} 🦄</h1>

        <!-- <p>Become a member and <b>register</b> or <b>log in</b> if you already have an account</p> -->


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
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email address') }}</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-dark">{{ __('Submit') }}</button>
            </form>
            <!-- <div class="button-container">
            <a href="{{ route('registration') }}" class="button">Register</a>

            <a href="{{ route('login') }}" class="button">Login</a>

        </div> -->
        </div>


</body>

</html>
@endsection