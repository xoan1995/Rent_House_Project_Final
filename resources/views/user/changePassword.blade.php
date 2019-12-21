<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <link rel="stylesheet" type="text/css" href="/css/app.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link rel="stylesheet" type="text/css" href="{{asset('storage/register/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('storage/register/css/main.css')}}">


</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">
                <img class="img-fluid" width="150px" src="{{asset('storage/images/logo/logo_2.jpg')}}" alt="">
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->

                    @guest

                        <li class="nav-item">
                            <a style="font-family: 'Abyssinica SI'; font-size: 1.25rem " class="nav-link"
                               href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a style="font-family: 'Abyssinica SI'; font-size: 1.25rem " class="nav-link"
                                   href="{{ route('register') }}">{{ __('Register') }}</a>
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

    <div class="limiter" style="border: #9e9e9e solid 1px">
        <div class="container-login100">
            <div class="login100-more" style="background-image: url('{{asset('storage/images/changePassword.jpg')}}');"></div>

            <div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
                <form class="login100-form validate-form" method="POST" action="{{ route('user.changePassword') }}">
                    @csrf
                    <span class="login100-form-title p-b-59">
						Change Password
					</span>

                    <div class="wrap-input100 validate-input" data-validate="Name is required">
                        <span class="label-input100">Old password</span>
                        <input id="passwordOld" class="input100  @error('passwordOld') is-invalid @enderror"
                               type="password" name="passwordOld"
                               placeholder="Old password"
                               value="{{ old('passwordOld') }}" required autocomplete="passwordOld" autofocus>
                        <span class="focus-input100"></span>
                    </div>


                    <div class="wrap-input100 validate-input" data-validate="Password is required">

                        <span class="label-input100">New password</span>

                        <input id="password" class=" input100 @error('passwordNew1') is-invalid @enderror"
                               type="password" placeholder="*************" name="passwordNew1" required
                               autocomplete="new-password">
                        <button type="button" onclick="showHidePassword()">
                            <img width="22px" src="{{asset('storage/images/eyes_hide.png')}}">
                        </button>

                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Repeat Password is required">
                        <span class="label-input100">Confirm password</span>
                        <input id="password-confirm" class="input100" type="password" placeholder="*************"
                               name="passwordNew2" required autocomplete="passwordNew2">
                        <button type="button" onclick="showHidePasswordConfirm()">
                            <img width="22px" src="{{asset('storage/images/eyes_hide.png')}}">
                        </button>

                        <span class="focus-input100"></span>
                    </div>

                    <div>
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Change password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{--script show/hide password--}}
<script src="{{asset('storage/js/showHidePassword.js')}}"></script>
{{--end script show/hide password--}}

<script src="/js/app.js"></script>
{!! toastr()->render() !!}
</body>
</html>
