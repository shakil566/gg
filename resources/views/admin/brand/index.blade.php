@extends('layouts.admin.master')
@section('admin_content')
    <!-- BEGIN CONTENT BODY -->
    <div class="content-wrapper">

        <!-- BEGIN PORTLET-->
        @include('layouts.admin.flash')
        <!-- END PORTLET-->

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@lang('english.BRAND')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard/admin') }}">@lang('english.DASHBOARD')</a></li>
                            <li class="breadcrumb-item active">@lang('english.BRAND')</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">@lang('english.BRAND_DETAILS')</h3>
                                <a href="{{ url('admin/brand/create') }}"
                                    class="btn btn-sm btn-info float-right">@lang('english.CREATE_NEW')</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="dataTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>@lang('english.SL_NO')</th>
                                            <th>@lang('english.NAME')</th>
                                            <th>@lang('english.CODE')</th>
                                            <th>@lang('english.PHOTO')</th>
                                            <th>@lang('english.ORDER')</th>
                                            <th>@lang('english.STATUS')</th>
                                            <th>@lang('english.ACTION')</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (!empty($brandArr))
                                            <?php
                                            $sl = 0;
                                            ?>
                                            @foreach ($brandArr as $value)
                                                <tr class="text-center">
                                                    <td>{{ ++$sl }}</td>
                                                    <td>{{ $value->name ?? '' }}
                                                    </td>
                                                    <td>{{ $value->code ?? '' }}</td>
                                                    <td class="text-center">
                                                        @if(isset($value->photo))
                                                        <img width="100" height="100" src="{{URL::to('/')}}/public/uploads/brand/{{$value->photo}}" alt="{{ $value->name}}">
                                                        @else
                                                        <img width="100" height="100" src="{{URL::to('/')}}/public/img/unknown.png" alt="{{ $value->name}}">
                                                        @endif
                                                    </td>
                                                    <td>{{ $value->order ?? '' }}</td>
                                                    <td>
                                                        @if ($value->status == '1')
                                                            <span class="badge badge-success">@lang('english.ACTIVE')</span>
                                                        @else
                                                            <span class="badge badge-danger">@lang('english.INACTIVE')</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ Form::open(['url' => 'admin/brand/' . $value->id, 'id' => 'delete']) }}
                                                        {{ Form::hidden('_method', 'DELETE') }}
                                                        <a class='btn btn-primary btn-xs'
                                                            href="{{ URL::to('admin/brand/' . $value->id . '/edit') }}"
                                                            title="{{ trans('english.EDIT') }}">
                                                            <i class='fa fa-edit'></i>
                                                        </a>
                                                        <button class="btn btn-danger btn-xs" type="submit"
                                                            title="{{ trans('english.DELETE') }}" data-placement="top"
                                                            data-rel="tooltip" data-original-title="Delete">
                                                            <i class='fa fa-trash'></i>
                                                        </button>
                                                        {{ Form::close() }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="15">{{ __('english.EMPTY_DATA') }}</td>
                                            </tr>
                                        @endif

                                    </tbody>
                                    {{-- <tfoot>
                                        <tr>

                                        </tr>
                                    </tfoot> --}}
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->

    </div>
    <!-- END CONTENT BODY -->

@stop
