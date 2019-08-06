<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Clozette Indonesia') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style media="screen">
        .active-like {
            text-decoration: underline;
            color: #222;
        }
        .panel {
            word-break: break-all;
        }
    </style>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div id="app">
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
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Clozette Indonesia') }}
                    </a>
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
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Articles <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="{!! route('category.showAll', ['name'=>'article - beauty']) !!}">Beauty</a></li>
                                  <li><a href="{!! route('category.showAll', ['name'=>'article - fashion']) !!}">Fashion</a></li>
                                  <li><a href="{!! route('category.showAll', ['name'=>'article - health']) !!}">Health</a></li>
                                  <li><a href="{!! route('category.showAll', ['name'=>'article - hijab']) !!}">Hijab</a></li>
                                  <li><a href="{!! route('category.showAll', ['name'=>'article - lifestyle']) !!}">Lifestyle</a></li>
                                  <li><a href="{!! route('category.showAll', ['name'=>'article - make up']) !!}">Make Up</a></li>
                                  <li><a href="{!! route('category.showAll', ['name'=>'article - skin care']) !!}">Skin Care</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Tutorials <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="{!! route('category.showAll', ['name'=>'tutorials - hijab']) !!}">Hijab</a></li>
                                  <li><a href="{!! route('category.showAll', ['name'=>'tutorials - diy projects']) !!}">DIY Projects</a></li>
                                  <li><a href="{!! route('category.showAll', ['name'=>'tutorials - nails']) !!}">Nails</a></li>
                                  <li><a href="{!! route('category.showAll', ['name'=>'tutorials - hair']) !!}">Hair</a></li>
                                  <li><a href="{!! route('category.showAll', ['name'=>'tutorials - make up']) !!}">Make Up</a></li>
                                  <li><a href="{!! route('category.showAll', ['name'=>'tutorials - skin care']) !!}">Skin Care</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Insiders <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="{!! route('category.showAll', ['name'=>'insiders - beauty']) !!}">Beauty</a></li>
                                  <li><a href="{!! route('category.showAll', ['name'=>'insiders - hijab']) !!}">Hijab</a></li>
                                  <li><a href="{!! route('category.showAll', ['name'=>'insiders - fashion']) !!}">Fashion</a></li>
                                  <li><a href="{!! route('category.showAll', ['name'=>'insiders - lifestyle']) !!}">Lifestyle</a></li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Friend Request <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    @foreach (Auth::user()->friends1->where('approved', '=', false) as $friend1)
                                        <li>
                                            <img src="{{ $friend1->user1->avatar }}" alt="Profile Picture" width="50" height="50">
                                            <div style="display: inline-block">
                                                {{ $friend1->user1->username }}
                                                <div data-userid="{{ $friend1->user1->id }}">
                                                    <a href="#" class="btn btn-success btn-sm request">Accept</a>
                                                    <a href="#" class="btn btn-danger btn-sm request">Cancel</a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                    @if (Auth::user()->friends1->where('approved', '=', false)->count() == 0)
                                        You Don't have any Friend Request
                                    @endif
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  <img src="/uploads/avatars/{{ Auth::user()->avatar}}"
                                    style="width:32px; height:32px; postion:absolute; top:10px; left:10px; border-radius:50%">
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/home') }}">Profile</a></li>
                                    <li><a href="{{ url('/post') }}">Post</a></li>
                                    <li><a href="{{ url('/category') }}">Category</a></li>
                                    <li><a href="{{ url('/users') }}">Users</a></li>
                                    <!-- <li><a href="{{ url('/post/category/tutorials') }}">Tutorials</a></li>
                                    <li><a href="{{ url('/post/category/insiders') }}">Insiders</a></li> -->
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
