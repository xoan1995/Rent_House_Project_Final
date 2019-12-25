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

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
          href="{{asset('storage/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('storage/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('storage/css/main.css')}}">
    <!--===============================================================================================-->


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
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title p-b-43">
						Login to continue
					</span>
                    <div class="mb-3">
                        <label for="validationServerUsername" style="font-size: 1.3rem">Username</label>
                        <div class="input-group">
                            <input id="email" name="email"
                                style="height: 70px; font-size: 1.5rem; border-radius: 10px"
                                type="email" class="form-control">
                            <div class="input-group-prepend">
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="validationServerUsername" style="font-size: 1.3rem">Password</label>
                        <div class="input-group">
                            <input id="password" name="password"
                                style="height: 70px; font-size: 1.5rem;
                                border-top-left-radius: 10px;
                                 border-bottom-left-radius: 10px;"
                                type="password" class="form-control">
                            <div class="input-group-prepend" bo>
                                <span class="input-group-text">
                                   <button type="button" id="loginPassword" onclick="showHidePassword()">
                                        <img id="show" class="img-fluid" width="30px"
                                             src="{{asset('storage/images/eyes_show.png')}}">
                                       <img style="display: none" id="hide" class="img-fluid" width="30px"
                                             src="{{asset('storage/images/eyes_hide.png')}}">
                                   </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                    <div class="text-danger">
                        Sai tài khoản hoặc mật khẩu!
                    </div>
                    @enderror
                    @error('password')

                    @enderror

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div>
                            <a class="txt1" href="#">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    </div>


                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or sign up using
						</span>
                    </div>

                    <div class="login100-form-social flex-c-m">
                        <a href="redirect/facebook" class="login100-form-social-item flex-c-m bg1 m-r-5">
                            <i class="fa fa-facebook-f" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>

                <div class="login100-more" style="background-image: url('{{'storage/images/bg-01.jpg'}}');"></div>
            </div>
        </div>
    </div>

</div>
</body>
<script src="{{asset('storage/js/showHidePassword.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</html>
