<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="http://localhost/shop/public/css/app.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">



</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Branding Image -->
                {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
                    {{--{{ config('app.name', 'Laravel') }}--}}
                {{--</a>--}}
                    <ul class="nav navbar-nav">
                        <li><a href="/shop/public/home"><img src="/shop/public/images/emblem.PNG"></a></li>
                        <li><a href="/shop/public/home">Главная</a></li>
                        <li class="dropdown">
                            <a href="/shop/public/category" class="dropdown-toggle" data-toggle="dropdown">
                                Велосипеды
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                {{--@foreach($categories as $category)--}}
                                {{--<li><a href="/shop/public/category/{{ $category->id }}">{{ $category->name }}</a></li>--}}
                                {{--<li class="divider"></li>--}}
                                    {{--@endforeach--}}
                            </ul>
                        </li>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header">Dropdown header 1</li>
                                <li><a href="#">HTML</a></li>
                                <li><a href="#">CSS</a></li>
                                <li><a href="#">JavaScript</a></li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Dropdown header 2</li>
                                <li><a href="#">About Us</a></li>
                            </ul>
            <li><a href="/shop/public/cards">Cards</a></li>
                        <li><a href="/shop/public/aboutus">О нас</a></li>
                    </ul>

            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">

                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <!-- Scripts -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="http://localhost/shop/public/js/app.js"></script>
<div class="footer" >
    <div class="container">
        <p class="footer-class">Copyrights © 2016 City Cicle. All rights reserved | Design by Aria.</p>
    </div>
</div>

</body>
</html>
