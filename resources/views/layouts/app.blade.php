<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project CARS</title>
    <link rel="stylesheet" href="{{ URL::asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/layout.css') }}">
    @yield('header') 
</head>
<body id="app-layout">
    <nav class="navbar navbar-static-top" id="app-default-navbar">
        <div class="container">
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}" data-toggle="tooltip" data-placement="bottom" title="Home"><i class="fa fa-home fa-fw" aria-hidden="true"></i></a></li>
                    <li><a href="{{ url('/about') }}" data-toggle="tooltip" data-placement="bottom" title="Over ons">Over ons</a></li>
                    <li><a href="{{ url('/contact') }}" data-toggle="tooltip" data-placement="bottom" title="Contact"><i class="fa fa-phone fa-fw" aria-hidden="true"></i>Contact</a></li>
                    <li><a href="{{ url('/cars') }}" data-toggle="tooltip" data-placement="bottom" title="Voertuigen"><i class="fa fa-car fa-btn" aria-hidden="true"></i>Voertuigen</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}" data-toggle="tooltip" data-placement="bottom" title="Inloggen"><i class="fa fa-sign-in fa-fw" aria-hidden="true"></i>Inloggen</a></li>
                        <li><a href="{{ url('/register') }}" data-toggle="tooltip" data-placement="bottom" title="Registreren">Registreren</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                            @if (Auth::user()->role >= 2)
                                <li><a href="{{ url('/backpanel/overview') }}"><i class="fa fa-btn fa-cog"></i>Beheer paneel</a></li>
                            @endif
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Uitloggen</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <header class="navbar navbar-default" id="app-sticky-navbar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-mobile-menu">
                    <span class="sr-only">Open navigatie</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ URL::asset('img/logo.png') }}" alt="car logo">
                </a>
            </div>
            <div class="collapse navbar-collapse navbar-padding">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/search') }}" data-toggle="tooltip" data-placement="left" title="Zoeken"><i class="fa fa-car fa-fw" aria-hidden="true"></i>Zoeken</a></li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="app-mobile-menu">
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}" title="Home">Home</a></li>
                    <li><a href="{{ url('/about') }}" title="Over ons">Over ons</a></li>
                    <li><a href="{{ url('/contact') }}" title="Contact">Contact</a></li>
                    <li><a href="{{ url('/cars') }}" title="Voertuigen">Voertuigen</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}" title="Inloggen">Inloggen</a></li>
                        <li><a href="{{ url('/register') }}" title="Registreren">Registreren</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                            @if (Auth::user()->role >= 2)
                                <li><a href="{{ url('/backpanel/overview') }}"><i class="fa fa-btn fa-cog"></i>Beheer paneel</a></li>
                            @endif
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Uitloggen</a></li>
                            </ul>
                        </li>
                    @endif
                    <li><a href="{{ url('/search') }}" title="Zoeken">Zoeken</a></li>
                </ul>
            </div>
        </div>
    </header>
    <section id="app-content">
        @yield('content')
    </section>
    <footer id="app-default-footer">
        <div class="container">
            <hr>
        </div>
    </footer>
    <script src="{{ URL::asset('assets/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/layout.js') }}"></script>
</body>
</html>
