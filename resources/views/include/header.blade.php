<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            @auth
            <a class="navbar-brand" href="{{route('books.index')}}">{{config('app.name')}}</a>
            @else
            <a class="navbar-brand" href="{{route('home')}}">{{config('app.name')}}</a>
            @endauth
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('book_new')}}">{{ __('Add a book') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('books.index')}}">{{ __('Books') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('reviews')}}">{{ __('Reviews') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('reading_lists')}}">{{ __('Reading lists') }}</a>
                    </li>
                    @if (Auth::check() && Auth::user()->role === 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users') }}">Admin Actions</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('home')}}">{{ __('Home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('registration')}}">{{ __('Registration') }}</a>
                    </li>
                    @endauth

                </ul>

                <!-- Language Switcher -->

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        @auth
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            🌍
                        </a>
                        @else
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Language 🌍
                        </a>
                        @endauth
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('lang.switch', 'en') }}"><span>🇺🇸</span> English</a>
                            <a class="dropdown-item" href="{{ route('lang.switch', 'lv') }}"><span>🇱🇻</span> Latviešu</a>
                        </div>
                    </li>
                </ul>


                <!-- Dropdown profilam -->
                @auth
                <li class="username-ul nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        | <b>{{ auth()->user()->name }}</b>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{route('profile.edit')}}">{{ __('Edit Profile') }}</a></li>
                        <li><a class="dropdown-item" href="{{route('profile.reading_lists')}}">{{ __('My Reading Lists') }}</a></li>
                        <li><a class="dropdown-item" href="{{route('profile.reviews')}}">{{ __('My Reviews') }}</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">{{ __('Logout') }}</a></li>
                    </ul>
                </li>
                @endauth

            </div>
        </div>
    </nav>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>