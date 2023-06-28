<head>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">{{config('app.name')}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">{{ __('Home') }}</a>
                </li>
                @auth
                <!-- <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}">{{ __('Logout')}}</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('book_new')}}">{{ __('Add a book') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('books.index')}}">{{ __('Books') }}</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="{{route('review_new')}}">{{ __('Add a review') }}</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('reviews')}}">{{ __('Reviews') }}</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="{{route('reading_list_new')}}">{{ __('New reading list') }}</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="{{route('reading_lists')}}">{{ __('Reading lists') }}</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('registration')}}">{{ __('Registration') }}</a>
                </li>
                @endauth

            </ul>


            <!-- Language Switcher -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('lang.switch', ['locale' => 'en']) }}">EN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('lang.switch', ['locale' => 'lv']) }}">LV</a>
                </li>
            </ul>




            <!-- Dropdown menu for the user's name -->

            @auth

            <li class="username-ul nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ auth()->user()->name }}
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