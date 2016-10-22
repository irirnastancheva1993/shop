<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link href="http://localhost/shop/public/css/app.css" rel="stylesheet">
    <link href="http://localhost/shop/public/css/style.css" rel="stylesheet">
    {{--<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">--}}
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <ul class="nav navbar-nav">
                <li><a href="/shop/public/home"><img src="/shop/public/images/emblem.PNG" width="54" height="44"></a></li>
                <li><a href="/shop/public/home">Главная</a></li>
                <li class="dropdown">
                    <a href="/shop/public/category" class="dropdown-toggle" data-toggle="dropdown">
                        Велосипеды
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/shop/public/category/1">ГИБРИД/ГОРОДСКОЙ</a></li>
                        <li><a href="/shop/public/category/2">ТРИАТЛОН</a></li>
                        <li><a href="/shop/public/category/3">ФИКС</a></li>
                        <li><a href="/shop/public/category/4">ЦИКЛОКРОСС</a></li>
                        <li><a href="/shop/public/category/5">ДОРОЖНЫЙ ЖЕНСКИЙ</a></li>
                        <li><a href="/shop/public/category/6">ТАНДЕМ</a></li>
                        {{--<li class="divider"></li>--}}
                    </ul>
                    {{--<ul class="dropdown-menu">--}}
                        {{--@if (isset($categories))--}}
                            {{--@foreach($categories as $category)--}}
                                {{--<li><a href="/shop/public/category/{{ $category->id }}">{{ $category->name }}</a></li>--}}
                                {{--<li class="divider"></li>--}}
                            {{--@endforeach--}}
                        {{--@endif--}}
                    {{--</ul>--}}
                </li>
                <li><a href="/shop/public/aboutus">О нас</a></li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Вход</a></li>
                    <li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Регистрация</a></li>
                @else
                    <li><a href="/shop/public/basket"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Корзина товаров</a></li>
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
                                    {{ csrf_field() }}
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
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
{{--<script src="js/bootstrap.min.js"></script>--}}
<script src="http://localhost/shop/public/js/app.js"></script>
<div class="footer" >
    <div class="container">
            <p class="text-muted">Copyrights © 2016 City Cicle. All rights reserved | Design by Aria.</p>
    </div>
</div>
</body>
</html>
