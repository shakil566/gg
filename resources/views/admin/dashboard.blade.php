@extends('layouts.admin.master')

@section('admin_content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@lang('english.DASHBOARD')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li> --}}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ Auth::user()->count() }}</h3>
                                <p>@lang('english.USER')</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <a href="{{ URL::to('/admin/users') }}" class="small-box-footer">@lang('english.MORE_INFO') <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ Auth::user()->department->count() }}
                                    {{-- <sup style="font-size: 20px">%</sup> --}}
                                </h3>

                                <p>@lang('english.DEPARTMENT')</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <a href="{{ URL::to('/admin/department') }}" class="small-box-footer">@lang('english.MORE_INFO') <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $productCategoryCount ?? '' }}</h3>

                                <p>@lang('english.PRODUCT_CATEGORY')</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-list-alt"></i>
                            </div>
                            <a href="{{ URL::to('/admin/productCategory') }}" class="small-box-footer">@lang('english.MORE_INFO') <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $brandCount ?? '' }}</h3>

                                <p>@lang('english.BRAND')</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <a href="{{ URL::to('/admin/brand') }}" class="small-box-footer">@lang('english.MORE_INFO') <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
