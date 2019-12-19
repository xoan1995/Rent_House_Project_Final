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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<nav class=" navbar navbar-expand-md">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">
            <img class="img-fluid" width="150px" src="{{asset('storage/images/logo/logo_2.jpg')}}" alt="">
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ml-auto" style="border-radius: 15px; background: rgba(186,186,186,0.31)">

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
                            <a href="" class="dropdown-item">History</a>
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
<div class="container center">
    <div class="card">
        <h5 class="card-header">Add House</h5>
        <div class="card-body">
            <form action="{{route('storeHouse')}}" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-6">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Title<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                @if(!$errors->has('title'))
                                    <input type="text" class="form-control" id="" name="title"
                                           placeholder=""
                                           value="">
                                @else
                                    <input type="text" class="form-control border-danger"
                                           name="title"
                                           placeholder=""
                                           value="">
                                    <i class="text-danger">{{$errors->first('title')}}</i>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Price<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                @if(!$errors->has('price'))
                                    <input type="number" class="form-control text-info" id="" name="price"
                                           placeholder="$"
                                           value=""
                                    >
                                @else
                                    <input type="number" class="form-control border-danger" id="" name="price"
                                           placeholder="$"
                                           value=""
                                    ><i class="text-danger">{{$errors->first('price')}}</i>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kind House<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                @if(!$errors->has('kindHouse'))
                                    <select name="kindHouse" class="form-control ">
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
                                @else
                                    <select name="kindHouse" class="form-control border-danger">
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
                                    <i class="text-danger">{{$errors->first('kindHouse')}}</i>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kind Room<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                @if(!$errors->has('kindRoom'))
                                    <select class="form-control" name="kindRoom">
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
                                @else
                                    <select class="form-control border-danger" name="kindRoom">
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
                                    <i class="text-danger">{{$errors->first('kindRoom')}}</i>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Number bedroom</label>
                            <div class="col-sm-10">
                                @if(!$errors->has('numBedroom'))
                                    <input type="number" class="form-control" id="" name="numBedroom"
                                           placeholder=""
                                           value="">
                                @else
                                    <input type="number" class="form-control border-danger" id="" name="numBedroom"
                                           placeholder=""
                                           value="">
                                    <i class="text-danger">{{$errors->first('numBedroom')}}</i>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Number bathroom</label>
                            <div class="col-sm-10">
                                @if(!$errors->has('numBathroom'))
                                    <input type="number" class="form-control " id="" name="numBathroom"
                                           placeholder=""
                                           value="">
                                @else
                                    <input type="number" class="form-control  border-danger" id="" name="numBathroom"
                                           placeholder=""
                                           value="">
                                    <i class="text-danger">{{$errors->first('numBathroom')}}</i>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">City<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                @if(!$errors->has('city_id'))
                                    <select class="form-control" name="city_id">
                                        <option value="" selected style=" display: none">
                                            Select
                                        </option>
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}">
                                                {{$city->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                @else
                                    <select class="form-control border-danger" name="city_id">
                                        <option value="" selected style="display: none">
                                            Select
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
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">District<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                @if(!$errors->has('district'))
                                    <select class="form-control" name="district_id">
                                        <option value="" selected style=" display: none">
                                            Select
                                        </option>
                                            @foreach($districts as $district)
                                                <option value="{{$district->id}}">
                                                    {{$district->name}}
                                                </option>
                                            @endforeach
                                    </select>
                                @else
                                    <select class="form-control border-danger" name="district_id">
                                        <option value="" selected style="display: none">
                                            Select
                                        </option>
                                        @foreach($districts as $district)
                                            <option value="{{$district->id}}">
                                                {{$district->name}}
                                            </option>
                                            <i class="text-danger">{{$errors->first('city_id')}}</i>
                                        @endforeach
                                    </select>
                                    <i class="text-danger">{{$errors->first('city_id')}}</i>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Descript<span
                                    class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                @if(!$errors->has('description'))
                                    <textarea class="form-control" rows="6" name="description"></textarea>
                                    <div class="invalid-feedback">Details!</div>
                                @else
                                    <textarea class="form-control text-info" rows="6" name="description">
                                        </textarea>
                                    <div class="invalid-feedback">Details!</div>
                                    <i class="text-danger">{{$errors->first('description')}}</i>
                                @endif
                            </div>
                        </div>
                        <button type="submit" style="margin-left: 77%" class="btn btn-primary mt-4">Submit</button>
                    </div>
                </div>
            </form>
            <form action="{{route('storeImage')}}">
                @csrf
                <div class="input-group">
                    <label class="col-sm-2 col-form-label">Image<span
                            class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file" id="inputGroupFile04" required>
                            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="button">Upload</button>
                        </div>
                    </div>
                </div>
            </form>
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



