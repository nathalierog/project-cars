<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project CARS</title>
    <link rel="stylesheet" href="{{ URL::asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/backpanel.css') }}">
    @yield('header') 
</head>
<body id="backpanel-layout">
    <header class="navbar navbar-inverse navbar-fixed-top" id="backpanel-sticky-navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#backpanel-mobile-menu">
                    <span class="sr-only">Open navigatie</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/backpanel/overview') }}">
                    Admin panel
                </a>
            </div>
            <div class="navbar-collapse collapse" id="backpanel-mobile-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/') }}"><i class="fa fa-btn fa-home"></i>Website</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Uitloggen</a></li>
                            <li><a href="{{ url('/backpanel/overview') }}"><i class="fa fa-tachometer fa-btn" aria-hidden="true"></i>Dashboard</a></li>
                            <li><a href="{{ url('/backpanel/cars') }}"><i class="fa fa-car fa-btn" aria-hidden="true"></i>Cars</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid margin-top">
        <div class="row">
            <aside class="col-md-2 navbar-inverse" id="backpanel-side-menu">                
                <div class="navbar-collapse collapse">
                    <ul class="nav">
                        <li><a href="{{ url('/backpanel/overview') }}"><i class="fa fa-tachometer fa-btn" aria-hidden="true"></i>Dashboard</a></li>
                        <li><a href="{{ url('/backpanel/cars') }}"><i class="fa fa-car fa-btn" aria-hidden="true"></i>Cars</a></li>
                    </ul>
                </div>
            </aside>  
            <section class="col-md-10 col-sm-10 col-md-offset-2 col-sm-offset-2" id="backpanel-content">           
                @yield('content')
            </section>
        </div>
    </div>
    <script src="{{ URL::asset('assets/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('assets/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ URL::asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/tablesorter/jquery.tablesorter.min.js') }}"></script>
    <script src="{{ URL::asset('js/backpanel.js') }}"></script>
</body>
</html>
