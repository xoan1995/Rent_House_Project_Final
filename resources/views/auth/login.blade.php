@extends('layouts.app')

@section('content')

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
					<span class="login100-form-title p-b-43">
						Login to continue
					</span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input id="email" class="input100 @error('email') is-invalid @enderror" type="email" name="email"
                                required autocomplete="email" autofocus>
                        <span class="focus-input100 dis-flex justify-content-end"></span>
                        <span class="label-input100">Email</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input id="password" class="input100 @error('password') is-invalid @enderror" type="password"
                                name="password" required
                               autocomplete="current-password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>
                    @error('email')
                    <div class="text-danger">
                        Sai tài khoản hoặc mật khẩu!
                    </div>
                    @enderror
                    @error('password')

                    @enderror

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

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

                        <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>

                <div class="login100-more" style="background-image: url('{{'storage/images/bg-01.jpg'}}');"></div>
            </div>
        </div>
    </div>

@endsection
