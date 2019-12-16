<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!--selector textarea-->
    <script
        src="https://cdn.tiny.cloud/1/xcof2eix88p59ocdt888tez8f99xx2kpbh0y6jliuxozkluj/tinymce/5/tinymce.min.js"></script>
    <script>tinymce.init({selector: 'textarea'})</script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('storage/editProfile/css/style.css')}}">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Trang chủ
        </a>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->

                @guest

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<div class="wrapper">
    <div class="inner">
        <div class="image-holder">
            <img src="{{asset('storage/editProfile/images/image_createHouse.jpg')}}" alt="">
        </div>
        <form action="{{route('storeHouse')}}" method="post" novalidate>
            @csrf
            <h3>Add new House</h3>
            <div class="form-wrapper">

                <div class="row">
                    <div class="col-12">
                        @if(!$errors->has('title'))
                            <input type="text" class="form-control text-info" id="" name="title" placeholder="*Title"
                                   value="" required="">
                        @else
                            <input type="text" class="form-control border-danger"
                                   name="title"
                                   placeholder="*Title"
                                   value="" required="">
                            <i class="text-danger">{{$errors->first('title')}}</i>
                        @endif
                    </div>
                    <div class="col-12">
                        @if(!$errors->has('price'))
                            <input type="number" class="form-control text-info" id="" name="price" placeholder="$"
                                   value=""
                                   required="">
                        @else
                            <input type="number" class="form-control border-danger" id="" name="price"
                                   placeholder="$"
                                   value=""
                                   required=""><i class="text-danger">{{$errors->first('price')}}</i>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    @if(!$errors->has('kindHouse'))
                        <select name="kindHouse" class="form-control " required="">
                            <option value="" selected style="display: none">
                                *Kind house
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
                    @else
                        <select name="kindHouse" class="form-control border-danger" required="">
                            <option value="" selected style="display: none">
                                * Kind house
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
                        <i class="text-danger">{{$errors->first('kindHouse')}}</i>
                    @endif
                </div>
                <div class="col-6">
                    @if(!$errors->has('kindRoom'))
                        <select class="form-control" name="kindRoom" required="">
                            <option value="" selected style="display: none">
                                * Kind room
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
                    @else
                        <select class="form-control border-danger" name="kindRoom" required="">
                            <option value="" selected style="display: none">
                                * Kind room
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
                        <i class="text-danger">{{$errors->first('kindRoom')}}</i>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    @if(!$errors->has('numBedroom'))
                        <input type="number" class="form-control" id="" name="numBedroom"
                               placeholder="*Number bedroom"
                               value="" required="">
                    @else
                        <input type="number" class="form-control border-danger" id="" name="numBedroom"
                               placeholder="*Number bedroom"
                               value="" required="">
                        <i class="text-danger">{{$errors->first('numBedroom')}}</i>
                    @endif
                </div>
                <div class="col-6">
                    @if(!$errors->has('numBathroom'))
                        <input type="number" class="form-control " id="" name="numBathroom"
                               placeholder="*Number bathroom"
                               value="" required="">
                    @else
                        <input type="number" class="form-control  border-danger" id="" name="numBathroom"
                               placeholder="*Number bathroom"
                               value="" required="">
                        <i class="text-danger">{{$errors->first('numBathroom')}}</i>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    @if(!$errors->has('address'))
                        <input type="text" class="form-control text-info" style="width: 100%" id="" name="address"
                               placeholder="*Address"
                               value="" required="">
                    @else
                        <input type="text" class="form-control text-info border-danger" style="width: 100%" id=""
                               name="address"
                               placeholder="*Address"
                               value="" required="">
                        <i class="text-danger">{{$errors->first('address')}}</i>
                    @endif
                </div>
                <div class="col-6">
                    @if(!$errors->has('city_id'))
                        <select class="form-control" name="city_id" required="">
                            <option value="" selected style=" display: none">
                                *City
                            </option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">
                                    {{$city->name}}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <select class="form-control border-danger" name="city_id" required="">
                            <option value="" selected style="display: none">
                                * City
                            </option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">
                                    {{$city->name}}
                                </option>
                                <i class="text-danger">{{$errors->first('city_id')}}</i>
                            @endforeach
                        </select>
                        <i class="text-danger">{{$errors->first('city_id')}}</i>
                    @endif
                </div>
            </div>
            <div class="form-wrapper">
                <label for="review-text"><span class="text-danger">*</span>Description</label>
                @if(!$errors->has('description'))
                    <textarea class="form-control text-info" rows="6" name="description" required=""></textarea>
                    <div class="invalid-feedback">Details!</div>
                @else
                    <p class="text-danger">{{$errors->first('description')}}</p>
                    <textarea class="form-control text-info" rows="6" name="description"
                              required="">
                       </textarea>
                    <div class="invalid-feedback">Details!</div>
                @endif
            </div>
            <div  class="form-wrapper" style="margin-top: -2rem">
                <button type="submit">Next</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>



