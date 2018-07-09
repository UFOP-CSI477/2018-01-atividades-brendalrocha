<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Análises Laboratoriais</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">Análises Laboratoriais</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">Home</a>
                            </li>
                            {{-- adm --}}
                            @if(Auth::user()->type==1)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('procedures.index') }}">Procedimentos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('tests.index') }}">Exames solicitados</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.patients') }}">Pacientes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.employees') }}">Funcionários</a>
                                </li>
                            {{-- op --}}
                            @elseif(Auth::user()->type==2)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('procedures.index') }}">Procedimentos</a>
                                </li>
                            {{-- paciente --}}
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('tests.create') }}">Agendar exame</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('tests.index') }}">Meus exames</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('procedures.index') }}">Listar Procedimentos</a>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Acessar meus dados') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Cadastrar') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @if(Session::has('mensagem'))
                    <div class="alert alert-warning" role="alert">
                        {{ Session::get('mensagem') }}
                    </div>
                @endif
            </div>
            @yield('content')
        </main>
    </div>
</body>
</html>
