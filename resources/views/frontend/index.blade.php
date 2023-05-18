@extends('layouts.frontend.master')
@section('title')
    @yield('Welcome to Demo Shop')
@endsection

@section('content')
    {{-- @include('layouts.frontend.slider') --}}
    <div class="home-main">
<a href="{{ URL::to('/admin') }}" class="admin-btn">@lang('english.GO_TO_ADMIN_PANEL') <i class="fa fa-play admin-icon"></i></a>

        {{-- @include('layouts.frontend.home_content') --}}
    </div>
    {{-- @include('layouts.frontend.include.footer') --}}
@endsection
