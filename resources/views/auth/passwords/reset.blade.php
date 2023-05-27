@extends('layouts.frontend.master')
@section('frontend_content')
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ url('/') }}">@lang('english.HOME')</a></li>
                    <li class="active">{{ __('Reset Password') }}</li>
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
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="login-form">
                            <h4 class="login-title">{{ __('Reset Password') }}</h4>
                            <div class="row">
                                <div class="col-md-12 col-12 mb-20">
                                    <label>{{ __('Email Address') }}</label>

                                    <input id="email" type="email" class="mb-0 @error('email') is-invalid @enderror"
                                        name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                        autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="col-12 mb-20">
                                    <label>{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                        class="mb-0  @error('password') is-invalid @enderror" name="password" required
                                        autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="col-12 mb-20">
                                    <label>{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="mb-0 " name="password_confirmation"
                                        required autocomplete="new-password">

                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn default-btn">
                                        {{ __('Reset Password') }}
                                    </button>
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
