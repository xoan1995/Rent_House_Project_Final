<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vitamin hung hăng</title>

    <link rel="shortcut icon" href="{{asset('favicon.ico') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style>
    .gift {
        border-radius: 25px;
        box-shadow: 0 4px 4px 0 rgba(0, 0, 0, .1);
        background-color: #fff;
    }
</style>
<body>
<div class="header-welcome fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{route('home')}}">
            <img class="img-fluid" width="150px" src="{{asset('storage/images/logo/logo_2.jpg')}}" alt="">
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">

                </li>
            </ul>

            <ul class="navbar-nav ">
                <li class="nav-item ml-3 gift" style="margin-top: 5px">
                    <a style="color: #1b1e21; font-size: 17px" href=""><img
                            src="https://img.icons8.com/bubbles/40/000000/gift.png">Nhận ngay 10$</a>
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

    <div class="container center">
        <style>
            body {
                background-image: url('{{asset('storage/images/background-create_house.jpg')}}');

            }
        </style>
        <div class="card">
            <h5 class="card-header">Send Email</h5>
            <div class="card-body">
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('user.send')}}" method="post" novalidate>
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">From<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="email">
                            {{--                                    <input type="text" class="form-control"--}}
                            {{--                                           @if($errors->has('title')) style="border:solid 1px red" @endif id=""--}}
                            {{--                                           name="title"--}}
                            {{--                                           placeholder=""--}}
                            {{--                                           value="">--}}
                            {{--                                    @if($errors->has('title'))--}}
                            {{--                                        <i class="text-danger">{{$errors->first('title')}}</i>--}}
                            {{--                                    @endif--}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">To<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="email">
                            {{--                                    <input type="text" class="form-control"--}}
                            {{--                                           @if($errors->has('title')) style="border:solid 1px red" @endif id=""--}}
                            {{--                                           name="title"--}}
                            {{--                                           placeholder=""--}}
                            {{--                                           value="">--}}
                            {{--                                    @if($errors->has('title'))--}}
                            {{--                                        <i class="text-danger">{{$errors->first('title')}}</i>--}}
                            {{--                                    @endif--}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">message<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name=" message">

                            {{--                                    <input type="number" @if($errors->has('price')) style="border:solid 1px red" @endif--}}
                            {{--                                    class="form-control text-info" id="" name="price"--}}
                            {{--                                           placeholder="$"--}}
                            {{--                                           value="">--}}
                            {{--                                    @if($errors->has('price'))--}}
                            {{--                                        <i class="text-danger">{{$errors->first('price')}}</i>--}}
                            {{--                                    @endif--}}
                        </div>
                    </div>
                    <button type="submit">send</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>
