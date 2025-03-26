<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>INVENTORY MANAGEMENT</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <style>
        body { background-color: #0D0D5F; } /* Biru Tua */
        .navbar { background-color: #4B0D74; } /* Ungu Tua */
        .sidebar { background-color: #4B0D74; min-height: 100vh; padding-top: 20px; } /* Ungu Tua */
        .nav-link { color: #FFFFFF; } /* Putih */
        .nav-link:hover { background-color: #8813A8; color: white; } /* Ungu Neon */
        .content { background: #D529B4; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); } /* Merah Muda Terang */
        .content h1, .content h2, .content h3, .content h4, .content h5, .content h6, .content p { color: #F05AE0; } /* Pink Neon */
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand px 3 border-bottom">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('home') }}">
                    INVENTORY MANAGEMENT
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="{{ Auth::user()->name }}" width="30" height="30" style="border-radius: 50%;">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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

        <div class="container-fluid">
            <div class="row">
                @auth
                <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                    <div class="position-sticky">
                        <ul class="nav flex-column">
                            @if(Auth::user()->hasRole('Admin'))
                                <li class="nav-item">
                                    <a class="nav-link text-white my-2 border-bottom" href="{{ route('roles.index') }}">Manage Roles</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white my-2 border-bottom" href="{{ route('users.index') }}">Manage Users</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white my-2 border-bottom" href="{{ route('stockins.index') }}">Manage Stocks In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white my-2 border-bottom" href="{{ route('stockouts.index') }}">Manage Stocks Out</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white my-2 border-bottom" href="{{ route('products.index') }}">Manage Products</a>
                                </li>
                            @elseif(Auth::user()->hasRole('Manager'))
                                <li class="nav-item">
                                    <a class="nav-link text-white my-2 border-bottom" href="{{ route('stockins.index') }}">Manage Stocks In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white my-2 border-bottom" href="{{ route('stockouts.index') }}">Manage Stocks Out</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white my-2 border-bottom" href="{{ route('products.index') }}">Manage Products</a>
                                </li>
                            @elseif(Auth::user()->hasRole('Employee'))
                                <li class="nav-item">
                                    <a class="nav-link text-white my-2 border-bottom" href="{{ route('stockins.index') }}">Manage Stocks In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white my-2 border-bottom" href="{{ route('stockouts.index') }}">Manage Stocks Out</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white my-2 border-bottom" href="{{ route('products.index') }}">Manage Products</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </nav>
                @endauth

                <main class="@auth col-md-9 ms-sm-auto col-lg-10 @else col-md-12 @endauth px-md-4 py-4">
                <div class="row justify-content-center mt-3">
                    <div class="col-md-12">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success text-center" role="alert">
                                {{ $message }}
                            </div>
                        @endif
                        @yield('content')
                        <div class="row justify-content-center text-center mt-3">
                            <div class="col-md-12">
                                <p>
                                    &copy; {{ date('Y') }} All rights reserved.
                                </p>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    {{-- mencegah user untuk kembali halaman login --}}
    <script>
        // previous page should be reloaded when user navigate through browser navigation
        // for mozilla
        window.onunload = function() {};
        // for chrome
        if (window.performance && window.performance.navigation.type ===
            window.performance.navigation.TYPE_BACK_FORWARD) {
            location.reload();
        }
    </script>
</body>
</html>
