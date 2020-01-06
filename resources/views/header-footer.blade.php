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

    .rating {
        float: left;
    }

    /* :not(:checked) is a filter, so that browsers that don’t support :checked don’t
      follow these rules. Every browser that supports :checked also supports :not(), so
      it doesn’t make the test unnecessarily selective */
    .rating:not(:checked) > input {
        position: absolute;
        top: -9999px;
        clip: rect(0, 0, 0, 0);
    }

    .rating:not(:checked) > label {
        float: right;
        width: 1em;
        /* padding:0 .1em; */
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 300%;
        /* line-height:1.2; */
        color: #ddd;
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
        position: relative;
        top: 2px;
        left: 2px;
    }

    .el-input-number {
        opacity: .4;
    }

    .item {
        box-shadow: 0 5px 20px 0 rgba(0, 0, 0, .1);
    }

    input[type=checkbox] {
        /* Double-sized Checkboxes */
        -ms-transform: scale(2); /* IE */
        -moz-transform: scale(2); /* FF */
        -webkit-transform: scale(2); /* Safari and Chrome */
        -o-transform: scale(2); /* Opera */
        padding: 10px;
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
                                    <div style="float: left; padding-top: 20px">
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
                            <div class="dropdown-menu item" aria-labelledby="navbarDropdown" style="width: 440px">
                                <div style="float: left" class="pl-3">
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

                                            <a data-id="{{$notice->uid}}"
                                               style="width: 55px; height: 21px; font-size: 0.85rem;
                                             font-family: Montserrat-Regular; padding-right: 56px;
                                              padding-bottom: 25px"
                                               type="button" class="btn btn-danger modalNotice" data-backdrop="false"
                                               data-toggle="modal"
                                               data-target="#exampleModal_1">
                                                Cancel
                                            </a>

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
                            @if(count(\App\SocialAccount::all())!=0)
                                @foreach(\App\SocialAccount::all() as  $account)
                                    @if(\Illuminate\Support\Facades\Auth::user()->id != $account->user_id)
                                        <a href="{{route('user.changePassword')}}" class="dropdown-item">Change
                                            password</a>
                                        <a href="{{route('editUser')}}" class="dropdown-item">Edit profile</a>
                                    @endif
                                @endforeach
                            @else
                                <a href="{{route('user.changePassword')}}" class="dropdown-item">Change
                                    password</a>
                                <a href="{{route('editUser')}}" class="dropdown-item">Edit profile</a>
                            @endif
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

<div class="modal fade" id="exampleModal_1" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal
                    title</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data"
                  action="{{route('user.reject')}}">
                @csrf
                <input style="display: none" name="notice_id" type="text" id="modalNotice">
                <div class="modal-body">
                    <div>
                        <div style="font-size: 1.25rem" class="pl-3">
                            <input type="checkbox"
                                   name="reasonOne" value="Lý do cá nhân">
                            &nbsp; Lý do cá nhân
                        </div>

                    </div>
                    <div>
                        <div style="font-size: 1.25rem" class="pl-3">
                            <input type="checkbox"
                                   name="reasonTwo"
                                   value="Đổi ngày hoặc điểm đến">
                            &nbsp; Đổi ngày hoặc điểm đến
                        </div>
                    </div>
                    <div>
                        <div style="font-size: 1.25rem" class="pl-3">
                            <input type="checkbox"
                                   name="reasonThree"
                                   value="Số lượng hoặc nhu cầu thay đổi">
                            &nbsp; Số lượng hoặc nhu cầu thay đổi
                        </div>
                    </div>
                    <div>
                        <div style="font-size: 1.25rem" class="pl-3">
                            <input type="checkbox"
                                   name="reasonFour" value="other...">
                            &nbsp; other...
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Send
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('storage/showslide/slide.js')}}"></script>
<script type="text/javascript" src="js/app.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="{{asset('storage/slick/slick.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{asset('storage/slick/slideCity.js')}}"></script>
<script>
    $(document).ready(function () {
        $(".modalNotice").click(function () {
            let id = $(this).data('id');
            $("#modalNotice").val(id);
        })
    });
</script>
<script>
    $('.modal').on('show.bs.modal', function (event) {
        var idx = $('.modal:visible').length;
        $(this).css('z-index', 1040 + (10 * idx));
    });
    $('.modal').on('shown.bs.modal', function (event) {
        var idx = ($('.modal:visible').length) - 1; // raise backdrop after animation.
        $('.modal-backdrop').not('.stacked').css('z-index', 1039 + (10 * idx));
        $('.modal-backdrop').not('.stacked').addClass('stacked');
    });
</script>
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
            $(".historyARentalHouse").hide();
        });
        $("#booking").click(function () {
            $(".posted").hide();
            $(".booking").show();
            $(".historyARentalHouse").hide();
        });
        $(".oneHouseHistory").click(function () {
            $(".posted").hide();
            $(".booking").hide();
            $(".historyARentalHouse").show();
            let houseId = $(this).data('id');
            if (houseId) {
                $.ajax({
                    url: "http://localhost:8000/houses/find-house-by-history-booking",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "GET",
                    dataType: "json",
                    data: {
                        houseId: houseId,
                    },
                    contentType: "application/json",
                    success: function (res) {
                        console.log(res[0]);
                        console.log(res[1]);
                        $(".historyARentalHouse").empty();
                        $(".historyARentalHouse").append(`
                    <div class="col-12">
                        <div class="row" style="width: 100%; height: 35px; background-color: rgba(0,0,0,0.03)">
                            <div class="col-4 pt-2 pl-5">
                                <h5 style="font-family: Arial">House</h5>
                            </div>
                            <div class="col-2 col-lg-2 pt-2 text-center">
                                <h6 style="font-family: Arial">Checkin</h6>
                            </div>
                            <div class="col-2 col-lg-2 pt-2  text-center">
                                <h6 style="font-family: Arial">Checkout</h6>
                            </div>
                            <div class="col-2 col-lg-2 pt-2 text-center" >
                                <h6 style="font-family: Arial;">Price</h6>
                            </div>
                            <div class="col-2 col-lg-2 pt-2 text-center">
                                <h6 style="font-family: Arial;" class="text-center ">Renter</h6>
                            </div>
                        </div>`);
                        $.each(res[1], function (key, house) {
                            $(".historyARentalHouse").append(
                                `
                                <div class="row mt-3">
                                <div class="col-5 col-lg-4">
                                    <div class="row">
                                        <div class="col-6">
                                            <img class="card-img" width="80px"
                                                 src="http://localhost:8000/storage/${res[4]}"
                                                 alt="...">
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <h6
                                                   style="font-family: Ubuntu;font-weight: bolder; font-size: 1rem;
                                                   font-weight: bold;
                                                   display: block;
                                                   width: 100%; max-lines: 2;
                                                   overflow: hidden;
                                                   white-space: nowrap;
                                                   text-overflow: ellipsis;">
                                                    ${res[0].title}
                                                </h6
                                                   style="font-family: Ubuntu;font-weight: bolder; font-size: 1rem;
                                                   font-weight: bold;
                                                   display: block;
                                                   width: 100%; max-lines: 2;
                                                   overflow: hidden;
                                                   white-space: nowrap;
                                                   text-overflow: ellipsis;">
                                            </div>
                                            <div>
                                                <h6>${res[0].kindHouse} ◦ ${res[0].kindRoom}</h6>
                                            </div>
                                        <div>
                                         <p style="font-family: 'Arial Rounded MT Bold'">Address: ${res[2]} - ${res[3]}</p>
                                   </div>
                                    </div>
                             </div>
                            </div>
                                <div class="col-2 col-lg-2 text-center">
                                    <h6 class="mr-4">${house.checkin}</h6>
                            </div>
                                <div class="col-2 col-lg-2 text-center">
                                    <h6 class="mr-4">${house.checkout}</h6>
                                </div>
                                <div class="col-2 col-lg-2 text-center">
                                    <h6 class="mr-4">$ ${house.totalPrice}</h6>
                                </div>
                                <div class="col-2 col-lg-2 text-center">
                                    <h6 class="mr-4">${house.user_id}</h6>
                                </div>
                        </div>
`
                            )
                        });
                        $(".historyARentalHouse").append(`</div>`)
                    },
                })
            }
        })
    });

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
