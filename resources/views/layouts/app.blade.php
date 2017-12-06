<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- JavaScript -->
    <script src="{{ asset('/js/app.js') }}"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="header-wrapper">
        <div class="container">
            <nav class="navbar" role="navigation">  
                <div class="navbar-brand">
                    <a class="navbar-item" href="{{ route('home')}}">
                        <img src="{{ asset('img/logo.png') }}"/>
                    </a>
                </div>
                <div class="navbar-menu">
                    <div class="navbar-start">
                        <a id="app-dropdown-menu-toggle" class="navbar-link" href="javascript:void(0);">Courses</a>
                        <a class="navbar-item" href="{{ route('search') }}">Search</a>                    
                    </div>
                    @if (Route::has('login'))
                    <div class="navbar-end">
                        @auth
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">{{ $auth->name }}</a>
                            <div class="navbar-dropdown">
                                <a class="navbar-item" href="{{ route('profile.index') }}">My account</a>
                                
                                @if($auth->can('access-admin-page'))
                                    <a class="navbar-item" href="{{ route('admin.home') }}">Admin</a>
                                @endif
                                <a class="navbar-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                        @else
                        <div class="navbar-item">
                            <a class="navbar-item" href="{{ route('login') }}">Log in</a>
                        </div>
                        <div class="navbar-item">
                            <a class="navbar-item" href="{{ route('register') }}">Register</a>
                        </div>
                        @endif
                    </div>
                    @endif
                </div>

            </nav>
        </div>
        <div id="app-dropdown-menu" class="box is-hidden" tabindex="-1">
            <div class="container">
                <div class="columns">
                    <div class="column has-text-centered">
                        Programming Language
                        <hr>
                        <ul>
                            @foreach($skillsList['Programming Language'] as $skill)
                            <li><a href="{{ route('search') }}?skill[]={{ $skill['id'] }}">{{$skill['display_name']}} ({{$skill['series_count']}})</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="column has-text-centered">
                        Framework
                        <hr>
                        <ul>
                            @foreach($skillsList['Framework'] as $skill)
                            <li><a href="{{ route('search') }}?skill[]={{ $skill['id'] }}">{{$skill['display_name']}} ({{$skill['series_count']}})</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="column has-text-centered">
                        Database
                        <hr>
                        <ul>
                            @foreach($skillsList['Database'] as $skill)
                            <li><a href="{{ route('search') }}?skill[]={{ $skill['id'] }}">{{$skill['display_name']}} ({{$skill['series_count']}})</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="column has-text-centered">
                        Must-have Skill
                        <hr>
                        <ul>
                            @foreach($skillsList['Must-have Skill'] as $skill)
                            <li><a href="{{ route('search') }}?skill[]={{ $skill['id'] }}">{{$skill['display_name']}} ({{$skill['series_count']}})</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        @yield('content')
    </div>
    <div class="footer-wrapper">
        <div class="container">
            <div class="columns">
                <div class="column is-1"></div>
                <div class="column is-2">
                    <img src="{{ asset('img/logo.png') }}" style="height: 45px;">
                </div>
                <div class="column is-5">
                    The Hong Kong Polytechnic University Hung Hom, Kowloon, Hong Kong<br>
                    Copyright © 2017 {{ env('APP_NAME') }}
                </div>
                <div class="column is-4">
                    <img src="{{ asset('img/laravel.png') }}" style="height: 20px;">
                    <img src="{{ asset('img/bulma.png') }}" style="height: 20px;">
                    <img src="{{ asset('img/github.png') }}" style="height: 20px;">
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        var appDropdownMenuToggle = document.getElementById('app-dropdown-menu-toggle');
        var appDropdownMenu = document.getElementById('app-dropdown-menu');

        document.addEventListener('click', function(e) {
            if (e.target.id !== 'app-dropdown-menu-toggle' && e.target.id !== 'app-dropdown-menu')
                appDropdownMenu.classList.add('is-hidden');
        });

        appDropdownMenuToggle.addEventListener('click', function(e) {
            appDropdownMenu.classList.toggle('is-hidden');
        });
    </script>
</body>
</html>
