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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('storage/editProfile/css/style.css')}}">

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
            <img src="{{asset('storage/editProfile/images/bg-registration-form-2.jpg')}}" alt="">
        </div>
        <form action="{{route('users.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h3>Update Form</h3>
            <div class="form-wrapper">
                <input name="name" type="text" value="{{$user->name}}" placeholder="Full name" class="form-control">
                @if($errors->has('name'))
                    <span class="text-danger">{{$errors->first('name')}}</span>
                @endif
            </div>
            <div class="form-wrapper">
                <input type="email" value="{{$user->email}}" name="email" disabled placeholder="Email Address"
                       class="form-control">
            </div>
            <div class="form-group" style="margin-bottom: -5px">
                <input type="date" class="form-control"
                       name="dob"
                       value="{{\Carbon\Carbon::createFromDate($user->dob)->format('Y-m-d')}}">

                <input type="text" name="idCard" value="{{$user->idCard}}" placeholder="Id card" class="form-control">
            </div>
            <div class="form-group">
                <div style="width: 50%">
                    @if($errors->has('dob'))
                        <span class="text-danger">{{$errors->first('dob')}}</span>
                    @endif
                </div>
                <div>
                    @if($errors->has('idCard'))
                        <span class="text-danger ">{{$errors->first('idCard')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-wrapper">
                <select name="gender" id="" class="form-control">
                    <option value="" disabled selected>Gender</option>
                    <option value="male" @if($user->gender == 'male') selected @endif >Male</option>
                    <option value="female" @if($user->gender == 'female') selected @endif >Female</option>
                    <option value="other" @if($user->gender == 'other') selected @endif >Other</option>
                </select>
                @if($errors->has('gender'))
                    <span class="text-danger ">{{$errors->first('gender')}}</span>
                @endif
            </div>
            <div class="form-wrapper">
                <textarea name="address" placeholder="Address" class="form-control">{{$user->address}}</textarea>
                @if($errors->has('address'))
                    <span class="text-danger ">{{$errors->first('address')}}</span>
                @endif
            </div>
            <div class="form-wrapper">
                <input type="text" name="phone" value="{{$user->phone}}" placeholder="phone number"
                       class="form-control">
                @if($errors->has('phone'))
                    <span class="text-danger ">{{$errors->first('phone')}}</span>
                @endif
            </div>
            <button>Confirm
            </button>
        </form>
    </div>
</div>

</body>
</html>

