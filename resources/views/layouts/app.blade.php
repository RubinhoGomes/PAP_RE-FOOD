<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Re-Food' }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Nucleo Icons -->
    <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link id="pagestyle" href="/assets/css/material-dashboard.css?v=3.0.2" rel="stylesheet" />

</head>

<body class="g-sidenav-show bg-gray-200">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="/">
                <img src="/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="Logo da Refood">
                <span class="ms-1 font-weight-bold text-Refood">Re-Food</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="{{ route('dashboard') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-archive"></i>
                        </div>
                        <span class="nav-link-text ms-1">Visão Geral</span>
                    </a>
                </li>

{{--                 <li class="nav-item">
                    <a class="nav-link text-white" href="">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-truck"></i>
                        </div>
                        <span class="nav-link-text ms-1">Rotas</span>
                    </a>
                </li> --}}


                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-truck"></i>
                        </div>
                        <span class="nav-link-text ms-1">Rotas</span>
                    </a>
                    <div class="dropdown-menu fade-up m-1">
                        <a href="{{ route('rotas') }}" class="dropdown-item">Listar</a>
                        <a href="{{ route('rotas.create') }}" class="dropdown-item">Adicionar</a>
                        {{--  <a href="#R3" class="dropdown-item">Remover</a> --}}
                    </div>
                </div>


{{--                 <li class="nav-item">
                    <a class="nav-link text-white" href="">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-utensils"></i>
                        </div>
                        <span class="nav-link-text ms-1">Refeições</span>
                    </a>
                </li> --}}

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-utensils"></i>
                        </div>
                        <span class="nav-link-text ms-1">Refeições</span>
                    </a>
                    <div class="dropdown-menu fade-up m-1">
                        <a href="{{ route('refeicoes') }}" class="dropdown-item">Listar</a>
                        <a href="{{ route('refeicoes.create') }}" class="dropdown-item">Adicionar</a>
                    </div>
                </div>

{{--                 <li class="nav-item">
                    <a class="nav-link text-white" href="">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-gift"></i>
                        </div>
                        <span class="nav-link-text ms-1">Donativos</span>
                    </a>
                </li> --}}

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-gift"></i>
                        </div>
                        <span class="nav-link-text ms-1">Donativos</span>
                    </a>
                    <div class="dropdown-menu fade-up m-1">
                        <a href="{{ route('donativos') }}" class="dropdown-item">Listar</a>
                        <a href="{{ route('donativos.create') }}" class="dropdown-item">Adicionar</a>
                    </div>
                </div>


{{--                 <li class="nav-item">
                    <a class="nav-link text-white" href="">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-chart-area"></i>
                        </div>
                        <span class="nav-link-text ms-1">Despesas</span>
                    </a>
                </li> --}}


                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-chart-area"></i>
                        </div>
                        <span class="nav-link-text ms-1">Despesas</span>
                    </a>
                    <div class="dropdown-menu fade-up m-1">
                        <a href="{{ route('despesas') }}" class="dropdown-item">Listar</a>
                        <a href="{{ route('despesas.create') }}" class="dropdown-item">Adicionar</a>
                    </div>
                </div>


            </ul>
        </div>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-none">
            <div class="container">
                <a class="navbar-brand">
                    <h6 class="font-weight-bolder mb-0 text-Refood">Re-Food </h6>
                </a>
{{--                 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent"> --}}
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">


                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                                </li>
                            @endif

                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user me-sm-1"></i>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/">
                                        {{ __('Visão Geral') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('register') }}">
                                        {{ __('Registrar') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    </div>
                            </li>
                        @endguest

                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
{{--                 </div> --}}
            </div>
        </nav>
        <!-- End Nav -->

        <!-- Content -->
        <main class="container-fluid py-4">
            @yield('content')
        </main>
    <!-- Footer -->
                <footer class="footer py-4">
                    <div class="container-fluid">
                        <div class="row align-items-center justify-content-lg-between">
                            <div class="col-lg-6 mb-lg-0 mb-4">
                                <div class="copyright text-center text-sm text-muted text-lg-start">
                                    ©
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script>,
                                    feito com <i class="fa fa-heart"></i> por
                                    <a href="" class="font-weight-bold" target="">Rúben Gomes</a>
                                    para ajudar os mais necessitados.
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                    <li class="nav-item">
                                        <a href="https://re-food.org/nucleos/portugal/caldas-da-rainha/" class="nav-link" target="_blank"><i class="fa fa-globe"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://www.facebook.com/RefoodCR/" class="nav-link" target="_blank"><i class="fab fa-facebook"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://www.instagram.com/refoodcr/" class="nav-link" target="_blank"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="https://twitter.com/refoodcr" class="nav-link" target="_blank"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="mailto:geral.caldasdarainha@re-food.org" class="nav-link" target="_blank"><i class="fas fa-envelope"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
    </div>
</main>
    <script src="/assets/js/core/popper.min.js"></script>
    <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="/assets/js/plugins/chartjs.min.js"></script>
{{--
    <script src="/assets/js/core/bootstrap.min.js"></script>
--}}
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="/assets/js/material-dashboard.min.js?v=3.0.2"></script>
</body>
</html>
