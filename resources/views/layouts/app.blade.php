<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>

    {{-- <script src="{{ asset('js/jquery.min.js') }}"></script> --}}

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                    <img height="30" src="{{ asset('images/logo/nav.png') }}">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">

                    </ul>
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item {{ Request::is('login') ? 'fw-bold' : null }}">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Masuk') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item {{ Request::is('register') ? 'fw-bold' : null }}">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Daftar') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ ucwords(strtolower(Auth::user()->name)) }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('home') }}" class="dropdown-item">
                                        <i class="fa fa-user"></i>
                                        Beranda
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off"></i>
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="mt-5 pt-5">
            @yield('content')
        </main>
        {{-- <div class="container-fluid">
            <footer class="d-flex flex-wrap justify-content-between align-items-center p-3 my-1 my-md-4 border">
                <p class="col-md-4 mb-0 text-muted d-none d-md-inline">© 2023 PT. Karya Anak Bangsa, Inc</p>

                <a href="{{ route('landing-page') }}"
                    class="col-12 col-md-4 d-flex align-items-center justify-content-center mb-0 me-md-auto link-dark text-decoration-none">
                    <img height="30" src="{{ asset('images/logo/nav.png') }}">
                </a>

                <ul class="nav col-12 col-md-4 justify-content-md-end justify-content-center">
                    <li class="nav-item">
                        <a href="#" class="nav-link px-2 text-muted">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link px-2 text-muted">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link px-2 text-muted">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link px-2 text-muted">
                            <i class="fa-brands fa-whatsapp"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link px-2 text-muted">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                    </li>

                </ul>
                <p class="col-12 mb-0 text-center text-muted d-inline d-md-none">© 2023 PT. Karya Anak
                    Bangsa, Inc</p>
            </footer>
        </div> --}}
    </div>
</body>

</html>
