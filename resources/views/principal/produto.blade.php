<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Catálogo de mercadorias </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-primary" style="background: linear-gradient(to right, rgb(183, 137, 75) 0%, rgb(183, 137, 75) 100%);">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Projeto Individual</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main-navbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('index') }}">Página do produto</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="background-color:#b38a4d;">


                            <a class="dropdown-item" href="{{ route('admin.index') }}">
                                Dashboard
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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

    <main class="w-100 bg-light">
        <div class="d-flex flex-nowrap min-vh-100">
            <div class="my-5 flex-grow-1">
                <div class="container-sm bg-body">
                    @yield('content')


                    <div class="row mt-4">

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        <img style=" background: green; border-radius: 16px !important ;" width="100%" src="/{{ $merchandise->main_photo }}">

                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row" style="margin-top: 90px;">
                                <div class="col-md-12 mt-2">
                                    <h4 style="font-weight: bold; font-size:42px;">{{ $merchandise->name }}</h4>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <h5 style="font-weight: bold; font-size:35px;">R$ {{ number_format($merchandise->sale_price,2,",",".")  }}</h5>
                                </div>
                                <br>
                                <div class="col-md-12" style="margin-top:30px;">
                                    <h5 style="font-size:30px;"> Quantidade: {{ $merchandise->amount }}</h5>
                                </div>
                                <br>
                                <div class="col-md-12" style="margin-top:10px;">
                                    <h5 style="font-size:30px;"> Descrição: {{ $merchandise->description }}</h5>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </main>

    <footer>

        <div class="row" style="background:linear-gradient(to right, rgb(183, 137, 75) 0%, rgb(183, 137, 75) 100%); height: 140px; padding: 30px 30px 30px 30px; color: #fff!important;
    font-weight: 500;">
            <div class="col-md-6">
                <h3>CONTATO</h3>
                <ul>
                    <li><a href="https://wa.me/5586998345768?text=s" target="_blank">
                            <img src="/images/w.svg" alt="Ir para Página do Instagram" /></a></li>
                </ul>
            </div>
            <div class="col-md-6">
                <h3>REDES SOCIAIS</h3>
                <a href="https://www.instagram.com/avillagabriella_/" target="_blank">
                    <img src="/images/inst.svg" alt="Ir para Página do Instagram" /></a>

                <a href="https://www.linkedin.com/in/avilla-ferreira/" target="_blank">
                    <img src="/images/li.svg" alt="Ir para Página do Linkedin" /></a>

            </div>
        </div>

    </footer>

</body>

<style type="text/css">
    ul {
        list-style: none !important;
        color: white !important;
    }

    ul a {
        text-decoration: none;
        color: white !important;
    }
</style>

</html>