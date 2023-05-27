@extends('layouts.frontend.master')
@section('frontend_content')
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ url('/') }}">@lang('english.HOME')</a></li>
                    <li class="active">{{ __('Register') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- Begin Login Content Area -->
    <div class="page-section mb-60">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12 div-center">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title">{{ __('Register') }}</h4>
                            <div class="row">
                                <div class="col-md-6 col-12 mb-20">

                                    <label>{{ __('First Name') }}*</label>
                                    <input id="firstName" type="text"
                                        class="mb-0 @error('first_name') is-invalid @enderror" name="first_name"
                                        placeholder="First Name" value="{{ old('first_name') }}"
                                        autocomplete="first_name" autofocus>

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 col-12 mb-20">
                                    <label>{{ __('Last Name') }}*</label>
                                    <input id="lastname" type="text"
                                        class="mb-0 @error('last_name') is-invalid @enderror" name="last_name"
                                        placeholder="Last Name" value="{{ old('last_name') }}"
                                        autocomplete="last_name" autofocus>

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 col-12 mb-20">
                                    <label>{{ __('Username') }}*</label>
                                    <input id="userName" type="text"
                                        class="mb-0 @error('username') is-invalid @enderror" name="username"
                                        placeholder="Username" value="{{ old('username') }}"
                                        autocomplete="username" autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 col-12 mb-20">
                                    <label>{{ __('Phone') }}</label>
                                    <input id="phoneNo" type="text" class="mb-0 @error('phone_no') is-invalid @enderror"
                                        name="phone_no" placeholder="Phone number" value="{{ old('phone_no') }}"
                                        autocomplete="phone_no" autofocus>

                                    @error('phone_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-20">
                                    <label>{{ __('Email Address') }}*</label>
                                    <input id="email" class="mb-0 @error('email') is-invalid @enderror"
                                        name="email" placeholder="Email Address" value="{{ old('email') }}"
                                        autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label>{{ __('Password') }}*</label>
                                    <input id="password" type="password"
                                        class="mb-0 @error('password') is-invalid @enderror" name="password"
                                        placeholder="Password"  autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-20">
                                    <label>{{ __('Confirm Password') }}*</label>
                                    <input id="password-confirm" type="password" class="mb-0" name="password_confirmation"
                                        placeholder="Confirm Password" autocomplete="new-password">

                                </div>
                                <div class="col-12">
                                    <button class="register-button mt-0">{{ __('Register') }}</button>
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
