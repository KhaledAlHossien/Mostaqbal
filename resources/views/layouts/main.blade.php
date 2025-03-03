<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<style>
    /* Ensure the layout takes full height */
    html, body {
        height: 100%;
        margin: 0;
    }
    .wrapper {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
    .content {
        flex: 1; /* This pushes the footer to the bottom */
    }
    footer {
        background-color: #343a40; /* Dark background */
        color: white;
        text-align: center;
        padding: 10px 0;
        position: relative;
        width: 100%;
    }
</style>
<body>
<div class="wrapper">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="container">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>


                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>
                    @if(Auth::user())
                <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Products</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('projects.index') }}">Projects</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Users</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('sidebar.create') }}">Sidebar</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                        </ul>
                </div>
                @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

{{--                            @if (Route::has('register'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

        </div>

    </nav>

    <div class="container-fluid content">
        <div class="row">

                <button class="navbar-toggler d-md-none" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">Toggler</span>
                </button>
                <nav class="col-md-2 bg-light sidebar p-3 collapse d-md-block" id="sidebarCollapse">
                    <div class="sidebar-sticky">
                        @if(isset($sidebar))
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <span class="nav-link"> {{ $sidebar->name }}</span>
                                </li>
                                <li class="nav-item">
                                    <span class="nav-link">{{ $sidebar->description }}</span>
                                </li>
                                <li class="nav-item">
                                    <span class="nav-link"><a href="mailto:{{ $sidebar->email }}">{{ $sidebar->email }}</a></span>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="https://wa.me/{{ $sidebar->whatsapp }}">
                                        <i class="fab fa-whatsapp"></i> Mostaqbal-WhatsApp
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ $sidebar->instagram }}">
                                        <i class="fab fa-instagram"></i> Mostaqbal-Instagram
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="https://t.me/{{ $sidebar->telegram }}">
                                        <i class="fab fa-telegram"></i> Mostaqbal-Telegram
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ $sidebar->X }}">
                                        <i class="fab fa-twitter"></i> Mostaqbal-X
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ $sidebar->snapchat }}">
                                        <i class="fab fa-snapchat"></i> Mostaqbal-Snapchat
                                    </a>
                                </li>
                            </ul>
                        @else
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <span class="nav-link">NULL</span>
                                </li>
                            </ul>
                        @endif
                    </div>
                </nav>


            <main class="col-md-10 ms-sm-auto px-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3">
        <p style="font-size: 20px">&copy; 2025 Mostaqbal Al Sham Soalr. All rights reserved.</p>
        <h6 style="font-size: 10px">Developed by <a href="mailto:hossink131@gmail.com">Khaled Al-Hossien</a></h6>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
