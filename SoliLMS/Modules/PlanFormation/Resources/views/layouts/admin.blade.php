<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>SoliLMS</title>

    {{-- Chargement unique du CSS via Vite --}}
    @vite(['resources/sass/admin.scss'])

    {{-- Font Awesome CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
          integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="layout-fixed sidebar-expand-lg sidebar-mini sidebar-collapse bg-body-tertiary">
    <div id="app" class="app-wrapper">

        {{-- Navbar --}}
        <nav class="navbar navbar-expand navbar-light bg-white shadow-sm">
            <div class="container">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="fa-solid fa-bars"></i>
                        </a>
                    </li>
                </ul>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto"></ul>

                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

        {{-- Sidebar --}}
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <div class="sidebar-brand">
                <a href="{{ route('admin.dashboard') }}" class="brand-link">
                    <span> Plan Annuel </span>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
        
                        {{-- Responsable : Dashboard + Plan --}}
                        @role('responsable')
                            <li class="nav-item">
                                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                    <i class="fas fa-chart-line fa-fw fa-lg"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('plans.index') }}" class="nav-link">
                                    <i class="fa-solid fa-newspaper fa-fw fa-lg"></i>
                                    <p>Plan</p>
                                </a>
                            </li>
                        @endrole
        
                        {{-- Formateur : Tous les boutons --}}
                        @role('formateur')
                            <li class="nav-item">
                                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                    <i class="fas fa-chart-line fa-fw fa-lg"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('plans.index') }}" class="nav-link">
                                    <i class="fa-solid fa-newspaper fa-fw fa-lg"></i>
                                    <p>Plan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('modules.index') }}" class="nav-link">
                                    <i class="fas fa-cubes fa-fw fa-lg"></i>
                                    <p>Modules</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('briefs.index') }}" class="nav-link">
                                    <i class="fas fa-file-alt fa-fw fa-lg"></i>
                                    <p>Briefs Projets</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('competences.index') }}" class="nav-link">
                                    <i class="fas fa-list-check fa-fw fa-lg"></i>
                                    <p>Compétences</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('formateurs.index') }}" class="nav-link">
                                    <i class="fas fa-chalkboard-teacher fa-fw fa-lg"></i>
                                    <p>Formateurs</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('evaluations.index') }}" class="nav-link">
                                    <i class="fas fa-clipboard-check fa-fw fa-lg"></i>
                                    <p>Types Évaluation</p>
                                </a>
                            </li>
                        @endrole
                    </ul>
                </nav>
            </div>
        </aside>        

        {{-- Main Content --}}
        <main class="py-4">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="app-footer text-center">
            <strong>SoliLMS &copy; 2025</strong> All rights reserved.
        </footer>
    </div>

    {{-- Chargement unique du JS via Vite --}}
    @vite(['resources/js/admin.js'])

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

    @yield('js')
</body>

</html>
