@extends('layouts.frontend.master')
@section('frontend_content')
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ url('/') }}">@lang('english.HOME')</a></li>
                    <li class="active">{{ __('Confirm Password') }}</li>
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

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="login-form">
                            <h6>{{ __('Please confirm your password before continuing.') }}</h6><br>
                            <h4 class="login-title">{{ __('Confirm Password') }}</h4>
                            <div class="row">
                                <div class="col-md-12 col-12 mb-20">
                                    <label>{{ __('Password') }}</label>

                                    <input id="password" type="password"
                                        class="mb-0 @error('password') is-invalid @enderror" name="password" required
                                        autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <button type="submit"
                                        class="btn default-btn mt-0">{{ __('Confirm Password') }}</button>
                                    @if (Route::has('password.request'))
                                        <a class="btn default-btn mt-0" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
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
