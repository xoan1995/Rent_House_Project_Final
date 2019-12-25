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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
        border-radius: 25px;
        box-shadow: 0 4px 4px 0 rgba(0, 0, 0, .1);
        background-color: #fff;
        width: 200px;
        padding-top: 5px;
        padding-left: 20px;
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
<<<<<<< HEAD
    .rating {
        float:left;
    }

    /* :not(:checked) is a filter, so that browsers that don’t support :checked don’t
      follow these rules. Every browser that supports :checked also supports :not(), so
      it doesn’t make the test unnecessarily selective */
    .rating:not(:checked) > input {
        position:absolute;
        top:-9999px;
        clip:rect(0,0,0,0);
    }

    .rating:not(:checked) > label {
        float:right;
        width:1em;
        /* padding:0 .1em; */
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:300%;
        /* line-height:1.2; */
        color:#ddd;
    }

    .rating:not(:checked) > label:before {
        content: '★ ';
    }

    .rating > input:checked ~ label {
        color: yellow;

    }

    .rating:not(:checked) > label:hover,
    .rating:not(:checked) > label:hover ~ label {
        color: yellow;

    }

    .rating > input:checked + label:hover,
    .rating > input:checked + label:hover ~ label,
    .rating > input:checked ~ label:hover,
    .rating > input:checked ~ label:hover ~ label,
    .rating > label:hover ~ input:checked ~ label {
        color: yellow;

    }

    .rating > label:active {
        position:relative;
        top:2px;
        left:2px;
=======

    .el-input-number {
        opacity: .4;
    }

    .item {
        box-shadow: 0 5px 20px 0 rgba(0, 0, 0, .1);
>>>>>>> 299d353876bce1d6f0cee1d35dd0ac45eb6b7a1b
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
                    <form class="form-inline" method="POST" action="{{route('search')}}" enctype="multipart/form-data">
                        @csrf
                        <select class="form-control" name="city" id="city" style="width: 120px">
                            <option value="">Thành Phố</option>
                            @foreach($cities as $key => $city)
                                <option value="{{1+$key}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                        <select class="form-control ml-2" name="district" id="district">
                            <option value="">Huyện</option>
                        </select>
                        <div class="nav-item dropdown ml-2">
                            <button style="color: #1b1e21" class="nav-link dropdown-toggle form-control"
                                    id="navbarDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tìm kiếm chi tiết
                            </button>
                            <div class="dropdown-menu item" aria-labelledby="navbarDropdown" style="width: 350px">
                                <div class="container">
                                    <div style="float: left; font-weight: bold; font-size: 17px">
                                        Số lượng phòng ngủ
                                    </div>
                                    <div style="float: right">
                                        <input type="button" class="btn btn-outline-danger down_1" value="-">
                                        <input id="number_1" name="numBedroom" type="text" value="0"
                                               style="width: 35px;text-align: center; border: whitesmoke">
                                        <input type="button" class="btn btn-outline-success up_1" value="+">
                                    </div>
                                    <div style="float: left; font-weight: bold; font-size: 17px" class="mt-3">
                                        Số lượng phòng tắm
                                    </div>
                                    <div style="float: right" class="mt-3">
                                        <input type="button" class="btn btn-outline-danger down_2" value="-">
                                        <input id="number_2" name="numBathroom" type="text" value="0"
                                               style="width: 35px;text-align: center; border: whitesmoke">
                                        <input type="button" class="btn btn-outline-success up_2" value="+">
                                    </div>
                                    <div style="float: left; font-weight: bold; font-size: 17px" class="mt-3">
                                        Giá tiền 1 đêm
                                    </div>
                                    <div style="float: left; padding-left: 65px; padding-top: 20px">
                                        <h5>($)</h5>
                                    </div>
                                    <div style="float: right" class="mt-3">

                                        <input type="button" class="btn btn-outline-danger down_3" value="-">
                                        <input id="number_3" name="price" type="text" value="0"
                                               style="width: 35px;text-align: center; border: whitesmoke">
                                        <input type="button" class="btn btn-outline-success up_3" value="+">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="nav-item dropdown ml-2">
                            <a style="color:black;" class="nav-link dropdown-toggle form-control" id="navbarDropdown"
                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ngày
                            </a>
                            <div class="dropdown-menu item" aria-labelledby="navbarDropdown" style="width: 400px">
                                <div style="float: left" class="pl-2">
                                    <div style="text-align: center; font-size: 17px; font-weight: bold">Từ</div>
                                    <input type="date" name="checkin" class="form-control">
                                </div>
                                <div style="float: left" class="ml-3">
                                    <div style="text-align: center; font-size: 17px; font-weight: bold">Đến</div>
                                    <input type="date" name="checkout" class="form-control">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-danger ml-3">
                            <img src="https://img.icons8.com/ios/20/000000/search--v1.png">
                        </button>
                    </form>
                </li>
            </ul>

            <ul class="navbar-nav ">
                <li class="nav-item ml-3 gift">
                    <a style="color: #1b1e21; font-size: 17px; padding-top: 20px" href=""><img
                            src="https://img.icons8.com/bubbles/40/000000/gift.png">Nhận ngay 10$</a>
                </li>
                <li class="nav-item" style="margin-top: 5px">
                    <a style="font-size: 17px" href="{{route('createHouse')}}" class="dropdown-item">Đăng nhà</a>
                </li>

                @guest
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link" href="#" role="button"
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
                            @if(count(\App\Notification::all()) > 0)
                                @foreach(\App\Notification::all() as $notice)
                                    @if(json_decode($notice->data)->receiver == auth()->user()->email)
                                        <div class="container">
                                            <a href="{{route('totalHouse', json_decode($notice->data)->house_id)}}">
                                                {{json_decode($notice->data)->message}} {{json_decode($notice->data)->title}}
                                                từ {{json_decode($notice->data)->checkin}}
                                                đến {{json_decode($notice->data)->checkout}}
                                                bởi {{json_decode($notice->data)->sender}}
                                            </a>
                                            <a style="width: 55px; height: 21px; font-size: 0.85rem; font-family: Montserrat-Regular; padding-right: 56px; padding-bottom: 25px"
                                               href="{{route('user.accept',$notice->uid)}}"
                                               class="btn btn-success">Confirm</a>
                                            <a style="width: 55px; height: 21px; font-size: 0.85rem; font-family: Montserrat-Regular; padding-right: 56px; padding-bottom: 25px"
                                               href="{{route('user.reject',$notice->uid)}}"
                                               class="btn btn-danger">Cancel</a>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <li class="container">
                                    You have no notifications!
                                </li>
                            @endif
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
                    <li class="nav-item dropdown">
                        <a style="font-size: 17px" id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                           role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}<span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a href="{{route('user.showHousePosted')}}" class="dropdown-item">My booking & posted</a>
                            <a href="{{route('user.changePassword')}}" class="dropdown-item">Change password</a>
                            <a href="{{route('editUser')}}" class="dropdown-item">Edit profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
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

<div class="container" style="margin-top: 6rem;">
    @yield('content')
</div>
<script src="{{asset('storage/showslide/slide.js')}}"></script>
<script type="text/javascript" src="js/app.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="{{asset('storage/slick/slick.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('storage/slick/slideCity.js')}}"></script>
<script>
    $('#city').change(function () {
        let cityID = $(this).val();
        if (cityID) {
            $.ajax({
                type: "GET",
                dataType: 'json',
                data: {
                    districtID: cityID
                },
                url: "http://127.0.0.1:8000/get-district-list",
                success: function (res) {
                    if (res) {
                        $('#district').empty();
                        $('#district').append('<option>Huyện</option>');
                        $.each(res, function (key, value) {
                            $('#district').append('<option value="' + key + '">' + value.name + '</option>')
                        });
                    } else {
                        $('#district').empty();
                    }
                }
            })
        } else {
            $('#district').empty();
            $('#city').empty();
        }
    });
    $(document).ready(function () {
        $("#posted").click(function () {
            $(".booking").hide();
            $(".posted").show();
        });
        $("#booking").click(function () {
            $(".posted").hide();
            $(".booking").show();
        });
    })
</script>
<script>
    $(document).ready(function () {

        $(".up_1").on("click", function () {

            var $button = $(this);
            var oldValue = $button.parent().find("#number_1").val();

            if ($button.text() == "+") {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                if (oldValue >= 0) {
                    var newVal = parseFloat(oldValue) + 1;
                } else {
                    newVal = 0;
                }
            }

            $button.parent().find("#number_1").val(newVal);

        });

        $(".down_1").on("click", function () {

            var $button = $(this);
            var oldValue = $button.parent().find("#number_1").val();

            if ($button.text() == "-") {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                if (oldValue >= 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }

            $button.parent().find("#number_1").val(newVal);

        });
    });
</script>
<script>
    $(document).ready(function () {

        $(".up_2").on("click", function () {

            var $button = $(this);
            var oldValue = $button.parent().find("#number_2").val();

            if ($button.text() == "+") {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                if (oldValue >= 0) {
                    var newVal = parseFloat(oldValue) + 1;
                } else {
                    newVal = 0;
                }
            }

            $button.parent().find("#number_2").val(newVal);

        });

        $(".down_2").on("click", function () {

            var $button = $(this);
            var oldValue = $button.parent().find("#number_2").val();

            if ($button.text() == "-") {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                if (oldValue >= 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }

            $button.parent().find("#number_2").val(newVal);

        });
    });
</script>
<script>
    $(document).ready(function () {

        $(".up_3").on("click", function () {

            var $button = $(this);
            var oldValue = $button.parent().find("#number_3").val();

            if ($button.text() == "+") {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                if (oldValue >= 0) {
                    var newVal = parseFloat(oldValue) + 1;
                } else {
                    newVal = 0
                }
            }

            $button.parent().find("#number_3").val(newVal);

        });

        $(".down_3").on("click", function () {

            var $button = $(this);
            var oldValue = $button.parent().find("#number_3").val();

            if ($button.text() == "-") {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                if (oldValue >= 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }

            $button.parent().find("#number_3").val(newVal);

        });
    });
</script>
{!! toastr()->render() !!}
</body>
</html>
