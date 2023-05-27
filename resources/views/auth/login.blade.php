@extends('layouts.frontend.master')
@section('frontend_content')
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ url('/') }}">@lang('english.HOME')</a></li>
                    <li class="active">{{ __('Login') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- Begin Login Content Area -->
    <div class="page-section mb-60">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30 div-center">
                    <!-- Login Form s-->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title">{{ __('Login') }}</h4>
                            <div class="row">
                                <div class="col-md-12 col-12 mb-20">
                                    <label>{{ __('Email Address') }}*</label>
                                    <input id="email"  class="mb-0 @error('email') is-invalid @enderror"
                                        name="email" placeholder="Email Address" value="{{ old('email') }}"
                                        autocomplete="email" autofocus>
                                    @if (session('error'))
                                        <strong class="text-danger">{{ session('error') }}</strong>
                                    @endif
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="col-12 mb-20">
                                    <label>{{ __('Password') }}*</label>
                                    <input id="password" type="password"
                                        class="mb-0 @error('password') is-invalid @enderror" name="password"
                                        placeholder="Password" autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="col-md-8">
                                    <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember_me"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember_me">{{ __('Remember Me') }}</label>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                    @if (Route::has('password.request'))
                                        <a class="" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="register-button mt-0">{{ __('Login') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content Area End Here -->
@endsection
