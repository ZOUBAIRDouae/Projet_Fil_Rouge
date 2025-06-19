<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SoliLMS</title>

    @vite(['resources/sass/admin.scss'])
</head>

<body class="layout-fixed sidebar-expand-lg sidebar-mini sidebar-collapse bg-body-tertiary">
    <div id="app" class="app-wrapper">
        <nav class="navbar navbar-expand navbar-light bg-white shadow-sm">
            <div class="container">
                <ul class="navbar-nav">
                    <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="fa-solid fa-bars"></i> </a> </li>
                </ul>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

               <div class="dropdown">
                    @guest
                        <div class="d-flex gap-2">
                            @if (Route::has('login'))
                            <a class="btn btn-outline-primary" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i>{{ __('Login') }}
                            </a>
                            @endif
                            @if (Route::has('register'))
                            <a class="btn btn-primary" href="{{ route('register') }}">
                                <i class="fas fa-user-plus me-1"></i>{{ __('Register') }}
                            </a>
                            @endif
                        </div>
                    @else
                        <button class="btn btn-light dropdown-toggle border-0 d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 32px; height: 32px;">
                                <span class="text-white fw-semibold small">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3">
                            <li><a class="dropdown-item py-2" href="#"><i class="fas fa-user me-2 text-muted"></i>{{ __('Profile') }}</a></li>
                            <li><a class="dropdown-item py-2" href="#"><i class="fas fa-cog me-2 text-muted"></i>{{ __('Settings') }}</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item py-2 text-danger" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt me-2"></i>{{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @endguest
                </div>
            </div>
        </nav>

        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <div class="sidebar-brand">  
                       <a href="{{ url('/') }}" class="brand-link" style="display: inline-flex; align-items: center; white-space: nowrap; gap: 4px;">
                    <div class="logo-icon">
                       <img src="{{ asset('favicon.ico') }}" class="fa-solid fa-blog" alt="Home" width="32" height="32">
                    </div>
                    <span class="brand-text fw-light">SoliLMS</span>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                        <li class="nav-item"> 
                            <a href="{{ route('admin.dashboard') }}" class="nav-link"> 
                            <i class="nav-icon fas fa-fas fa-chart-bar"></i>
                                <p>Dashboard</p>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a href="{{ route('plans.index') }}" class="nav-link"> 
                            <i class="nav-icon fas fa-table"></i>
                                <p>Plan</p>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a href="{{ route('modules.index') }}" class="nav-link"> 
                            <i class="fa-solid fa-tags"></i>
                                <p>Modules</p>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a href="{{ route('briefs.index') }}" class="nav-link"> 
                            <i class="fa-solid fa-tags"></i>
                                <p>Briefs Projets</p>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a href="{{ route('competences.index') }}" class="nav-link"> 
                            <i class="fa-solid fa-competences"></i>
                                <p>Competences</p>
                            </a> 
                        </li>
                        <li class="nav-item"> 
                            <a href="{{ route('formateurs.index') }}" class="nav-link"> 
                                <i class="fa-solid fa-user-tie"></i>
                                <p>Formateurs</p>
                            </a> 
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="app-footer text-center">
            <strong>
                SoliLMS &copy; 2025&nbsp;
            </strong>
            All rights reserved.
        </footer>
    </div>

    <!-- Scripts -->
    @vite(['resources/js/admin.js'])
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>