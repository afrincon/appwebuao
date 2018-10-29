<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
      <!-- Navbar start -->
      <nav class="navbar is-info" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
          <a href="/" class="navbar-item">
            <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
          </a>
          <a class="navbar-burger burger" aria-label="menu" role="button" aria-expanded="false" data-target="navbarArquidiocesis">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </a>
        </div>

        <div id="navbarArquidiocesis" class="navbar-menu">
          <div class="navbar-start">
              <a href="{{ url('/home') }}" class="navbar-item">Inicio</a>
              <a href="#" class="navbar-item">Ayudas</a>
              <a href="{{ url('beneficiarios') }}" class="navbar-item">Beneficiarios</a>
              <a href="{{ url('iglesias') }}" class="navbar-item">Iglesias</a>
              @if (Auth::user()->hasRole('admin'))
                <a href="{{ url('usuarios') }}" class="navbar-item">Usuarios</a>
              @endif
              
          </div>
          <div class="navbar-end">
            <div class="navbar-item">          
              <div class="buttons">
                <label class="label align-right text-white">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </label>              
                
                <a class="button is-primary is-inverted is-outlined is-rounded" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
            </div>
          </div>
        </div>        
      </nav>

      <!-- Navbar end -->
      <main class="container">
        <div class="columns is-mobile">
          @yield('content')
        </div>        
      </main>
    </div>
</body>
</html>