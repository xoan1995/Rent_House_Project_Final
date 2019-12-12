<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vitamin hung hăng</title>

    <link rel="shortcut icon" href="{{asset('favicon.ico') }}">

    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
@include('sweetalert::alert')
<div class="header-welcome">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </li>
                <li class="nav-item">
                    @if (Route::has('login'))
                        <div class="top-right links">
                            @auth
                            @else
                                {{--                            <a href="{{ route('login') }}">Đăng Nhập</a>--}}

                                @if (Route::has('register'))
                                    {{--                                <a href="{{ route('register') }}">Đăng ký</a>--}}
                                @endif
                            @endauth
                        </div>
                    @endif
                </li>
            </ul>

            <ul class="navbar-nav ">
                @guest

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <a href="{{route('createHouse')}}" class="dropdown-item">Đăng nhà</a>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <a href="{{route('user.changePassword')}}" class="dropdown-item">Change password</a>
                            <a href="{{route('editUser')}}" class="dropdown-item">Edit profile</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>

        </div>
    </nav>
</div>

<div class="container">

    <div>
        @if(\Illuminate\Support\Facades\Auth::user())
            <div style="font-size: 30px; font-weight: bold; color: #1b1e21"> Welcom To Luxury Rent
                House, {{\Illuminate\Support\Facades\Auth::user()->name}}</div>
            <div>Đặt chỗ ở, homestay, cho thuê xe, trải nghiệm và nhiều hơn nữa trên Luxury Rent House</div>
        @else
            <div style="font-size: 30px; font-weight: bold; color: #1b1e21">Chào mừng đến với Luxury Rent House!</div>
            <div>Đặt chỗ ở, homestay, trải nghiệm và nhiều hơn nữa trên Luxury Rent House</div>
            <div> Đăng nhập hoặc Đăng ký để trải nghiệm !</div>
        @endif

    </div>
    <div>
        @yield('content')
    </div>
</div>

<script type="text/javascript" src="js/app.js"></script>
{!! toastr()->render() !!}
</body>
</html>
