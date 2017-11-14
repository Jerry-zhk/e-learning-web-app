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
                            <a class="navbar-link">{{ Auth::user()->name }}</a>
                            <div class="navbar-dropdown">
                                <a class="navbar-item" href="">My account</a>
                                <a class="navbar-item" href="{{ route('admin.home') }}">Admin</a>
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
                        A
                        <hr />
                        <ul>
                            <li>1</li>
                            <li>2</li>
                            <li>3</li>
                            <li>4</li>
                            <li>5</li>
                        </ul>
                    </div>
                    <div class="column has-text-centered">B</div>
                    <div class="column has-text-centered">C</div>
                    <div class="column has-text-centered">D</div>
                    <div class="column has-text-centered">E</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        @yield('content')
    </div>
    <div class="footer-wrapper">
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
