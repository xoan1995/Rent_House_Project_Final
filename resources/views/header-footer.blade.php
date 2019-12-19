<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vitamin hung hăng</title>


    <link rel="stylesheet" type="text/css" href="{{asset('storage/slick/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('storage/slick/slick-theme.css')}}">


    <link rel="shortcut icon" href="{{asset('favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<style type="text/css">
    html, body {
        margin: 0;
        padding: 0;
    }

    * {
        box-sizing: border-box;
    }

    .slider {
        width: 50%;
        margin: 100px auto;
    }

    .slick-slide {
        margin: 0px 10px;
    }

    .slick-slide img {
        width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
        color: black;
    }

    .fixed {
        height: 30px;
        line-height: 30px;
        color: #fff;
        position: fixed;
        width: 100%;
        z-index: 1000;
    }

    .parent {
        /*width: 500px;*/
        height: 1300px;
        margin: 10px auto;
    }

    .child {
        width: 100%;
        height: 350px;
        margin-top: 30px;
        position: -webkit-sticky;
        position: sticky;
        top: 100px;
        background: #f8fafc;
    }

    .gift {
        border-radius: 35px;
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .1);
        background-color: #fff;
    }

    .name {
        font-size: .875rem;
        background: gainsboro;
        /*padding: .3125rem 1.75rem .3125rem .3125rem;*/
        border-radius: 2rem;
    }

    #carouselExampleFade {
        width: 100vw;
        position: relative;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
    }

    .card_1 {
        box-shadow: 0 2px 10px 0 rgba(0, 0, 0, .1)
    }
</style>

<body>
@include('sweetalert::alert')
<div class="header-welcome fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{route('home')}}">
            <img class="img-fluid" width="150px" src="{{asset('storage/images/logo/logo_2.jpg')}}" alt="">
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <form class="form-inline" action="{{route('search')}}" enctype="multipart/form-data">
                        @csrf
                        <select class="form-control" name="address">
                            @foreach($cities as $city)
                                <option value="">{{$city->name}}</option>
                            @endforeach
                        </select>
                        <select class="form-control ml-2" name="district">
                            @foreach($districts as $district)
                                <option value="">
                                    {{$district->name}}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-outline-danger ml-3"><img
                                src="https://img.icons8.com/ios/20/000000/search--v1.png">
                        </button>
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
                <li class="nav-item ml-3 gift" style="margin-top: 2px">
                    <a style="color: #1b1e21; font-size: 17px" href=""><img
                            src="https://img.icons8.com/bubbles/40/000000/gift.png">Nhận ngay 10$</a>
                </li>
                <li class="nav-item" style="margin-top: 5px">
                    <a style="font-size: 17px" href="{{route('createHouse')}}" class="dropdown-item">Đăng nhà</a>
                </li>

                @guest
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span class="">
                            <img src="https://img.icons8.com/carbon-copy/35/000000/bell.png">
                        </span>
                            <span class="badge-light">
                                <?php $count = 0 ?>
                                @if (auth()->user())
                                    @foreach (\App\Notification::all() as $notice)
                                        @if(json_decode($notice->data)->receiver == auth()->user()->email)
                                            <?php $count++ ?>
                                        @endif
                                    @endforeach
                                @endif
                                ({{$count}})
                            </span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                            style="width: 600px">
                            @foreach(\App\Notification::all() as $notice)
                                @if(json_decode($notice->data)->receiver == auth()->user()->email)
                                    <div>
                                        <a href="{{route('totalHouse', json_decode($notice->data)->house_id)}}">
                                            {{json_decode($notice->data)->message}} {{json_decode($notice->data)->title}}
                                            từ {{json_decode($notice->data)->checkin}}
                                            đến {{json_decode($notice->data)->checkout}}
                                            bởi {{json_decode($notice->data)->sender}}
                                        </a>
                                    </div>
                                    <div>
                                        <a style="width: 55px; height: 21px; font-size: 0.85rem; font-family: Montserrat-Regular; padding-right: 57px; padding-bottom: 25px"
                                           href="" class="btn btn-success">Confirm</a>
                                        <a style="width: 55px; height: 21px; font-size: 0.85rem; font-family: Montserrat-Regular; padding-right: 57px; padding-bottom: 25px"
                                           href="" class="btn btn-danger">Cancel</a>
                                    </div>
                                @endif
                            @endforeach

                        </ul>
                    </li>
                @endguest

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
                    <li class="nav-item dropdown name">
                        <a style="font-size: 17px" id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                           role="button"
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
                            <a href="#" class="dropdown-item">History</a>
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

<div class="container" style="margin-top: 5rem">

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
<script src="{{asset('storage/showslide/slide.js')}}"></script>
<script type="text/javascript" src="js/app.js"></script>

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="{{asset('storage/slick/slick.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('storage/slick/slideCity.js')}}"></script>
{!! toastr()->render() !!}
</body>
</html>
