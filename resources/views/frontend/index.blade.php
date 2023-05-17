@extends('layouts.frontend.master')
@section('title')
    @yield('Welcome to Demo Shop')
@endsection

@section('content')
    @include('layouts.frontend.slider')
    <div class="contact-list margin-top-10 margin-bottom-10">

        {{-- @include('layouts.frontend.home_content') --}}
    </div>
    {{-- @include('layouts.frontend.include.footer') --}}
@endsection
