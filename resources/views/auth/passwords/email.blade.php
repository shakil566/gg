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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title">{{ __('Reset Password') }}</h4>
                            <div class="row">
                                <div class="col-md-12 col-12 mb-20">
                                    <label>{{ __('Email Address') }}*</label>


                                    <input id="email" type="email" class="mb-0 @error('email') is-invalid @enderror" name="email"  placeholder="Email Address" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn default-btn mt-0">{{ __('Send Password Reset Link') }}</button>
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
