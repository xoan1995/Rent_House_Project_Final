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
            <h5 class="card-header">Add House</h5>
            <div class="card-body">
                <form action="{{route('storeHouse')}}" method="post" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Title<span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control"
                                           @if($errors->has('title')) style="border:solid 1px red" @endif id=""
                                           name="title"
                                           placeholder=""
                                           value="">
                                    @if($errors->has('title'))
                                        <i class="text-danger">{{$errors->first('title')}}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Price<span class="text-danger">*</span></label>
                                <div class="col-sm-9">

                                    <input type="number" @if($errors->has('price')) style="border:solid 1px red" @endif
                                    class="form-control text-info" id="" name="price"
                                           placeholder="$"
                                           value="">
                                    @if($errors->has('price'))
                                        <i class="text-danger">{{$errors->first('price')}}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kind House
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-9">

                                    <select name="kindHouse" class="form-control "
                                            @if($errors->has('kindHouse')) style="border:solid 1px red" @endif>
                                        <option value="" selected style="display: none">
                                        </option>
                                        <option value="{{\App\KindOfHouseInterface::APRTMENT}}">
                                            {{\App\KindOfHouseInterface::APRTMENT}}
                                        </option>
                                        <option value="{{\App\KindOfHouseInterface::CONDOTEL}}">
                                            {{\App\KindOfHouseInterface::CONDOTEL}}
                                        </option>
                                        <option value="{{\App\KindOfHouseInterface::MOTEL}}">
                                            {{\App\KindOfHouseInterface::MOTEL}}
                                        </option>
                                        <option value="{{\App\KindOfHouseInterface::ENTIREHOME}}">
                                            {{\App\KindOfHouseInterface::ENTIREHOME}}
                                        </option>
                                        <option value="{{\App\KindOfHouseInterface::VILA}}">
                                            {{\App\KindOfHouseInterface::VILA}}
                                        </option>
                                    </select>
                                    @if($errors->has('kindHouse'))
                                        <i class="text-danger">{{$errors->first('kindHouse')}}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Kind Room
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="kindRoom"
                                            @if($errors->has('kindRoom')) style="border:solid 1px red" @endif>
                                        <option value="" selected style="display: none">
                                        </option>
                                        <option value="{{\App\KindOfRoomInterface::SINGLE}}">
                                            {{\App\KindOfRoomInterface::SINGLE}}
                                        </option>
                                        <option value="{{\App\KindOfRoomInterface::COUPLE}}">
                                            {{\App\KindOfRoomInterface::COUPLE}}
                                        </option>
                                        <option value="{{\App\KindOfRoomInterface::FAMILY}}">
                                            {{\App\KindOfRoomInterface::FAMILY}}
                                        </option>
                                    </select>
                                    @if($errors->has('kindRoom'))
                                        <i class="text-danger">{{$errors->first('kindRoom')}}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Number bedroom
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-9">

                                    <input type="number" @if($errors->has('numBedroom')) style="border:solid 1px red"
                                           @endif class="form-control" id="" name="numBedroom"
                                           placeholder=""
                                           value="">
                                    @if($errors->has('numBedroom'))
                                        <i class="text-danger">{{$errors->first('numBedroom')}}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Number bathroom
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-sm-9">
                                    <input type="number" @if($errors->has('numBathroom')) style="border:solid 1px red"
                                           @endif class="form-control " id="" name="numBathroom"
                                           placeholder=""
                                           value="">
                                    @if($errors->has('numBathroom'))
                                        <i class="text-danger">{{$errors->first('numBathroom')}}</i>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">City<span class="text-danger">*</span></label>
                                <div class="col-sm-10">

                                    <select class="form-control"
                                            @if($errors->has('city_id')) style="border:solid 1px red"
                                            @endif name="city_id">
                                        <option value="" selected style=" display: none">
                                            Select
                                        </option>
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}">
                                                {{$city->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('city_id'))
                                        <i class="text-danger">{{$errors->first('city_id')}}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">District<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control"
                                            @if($errors->has('distric_id')) style="border:solid 1px red"
                                            @endif name="district_id">
                                        <option value="" selected>
                                            Select
                                        </option>
                                        <option value="" selected style=" display: none">
                                            Select
                                        </option>
                                        @foreach($districts as $district)
                                            <option value="{{$district->id}}">
                                                {{$district->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('district_id'))
                                        <i class="text-danger">{{$errors->first('district_id')}}</i>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Address<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control"
                                           @if($errors->has('address')) style="border:solid 1px red" @endif id=""
                                           name="address"
                                           placeholder=""
                                           value="">
                                    @if($errors->has('address'))
                                        <i class="text-danger">{{$errors->first('address')}}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Descript<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                <textarea class="form-control"
                                          @if($errors->has('description')) style="border:solid 1px red" @endif rows="3"
                                          name="description"></textarea>
                                    <div class="invalid-feedback">Details!</div>
                                    @if($errors->has('description'))
                                        <i class="text-danger">{{$errors->first('description')}}</i>
                                    @endif
                                </div>
                            </div>
                            <div class="input-group">
                                <label class="col-sm-2 col-form-label">Image<span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input @if($errors->has('images')) style="border:solid 1px red" @endif type="file"
                                           multiple class="custom-file-input" name="images[]"
                                           id="inputGroupFile04" required>
                                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                    @if($errors->has('images'))
                                        <i class="text-danger">{{$errors->first('images')}}</i>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" style="text-align: right; margin-left: 45%"
                                    class="btn btn-primary mt-4">Submit
                            </button>
                            <a href="/" style="text-align: right" class="btn btn-danger mt-4">Cancel</a>
                        </div>
                    </div>
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
