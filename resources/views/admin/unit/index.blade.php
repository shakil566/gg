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
                        <h1>@lang('english.UNIT')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard/admin') }}">@lang('english.DASHBOARD')</a></li>
                            <li class="breadcrumb-item active">@lang('english.UNIT')</li>
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
                                <h3 class="card-title">@lang('english.UNIT_DETAILS')</h3>
                                <a href="{{ url('admin/unit/create') }}"
                                    class="btn btn-sm btn-info float-right">@lang('english.CREATE_NEW')</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="dataTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>@lang('english.SL_NO')</th>
                                            <th>@lang('english.TITLE')</th>
                                            <th>@lang('english.INFO')</th>
                                            <th>@lang('english.ORDER')</th>
                                            <th>@lang('english.STATUS')</th>
                                            <th>@lang('english.ACTION')</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (!empty($unitArr))
                                            <?php
                                            $sl = 0;
                                            ?>
                                            @foreach ($unitArr as $value)
                                                <tr class="text-center">
                                                    <td>{{ ++$sl }}</td>
                                                    <td>{{ $value->title ?? '' }}
                                                    <td>{{ $value->info ?? '' }}
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
                                                        {{ Form::open(['url' => 'admin/unit/' . $value->id, 'id' => 'delete']) }}
                                                        {{ Form::hidden('_method', 'DELETE') }}
                                                        <a class='btn btn-primary btn-xs'
                                                            href="{{ URL::to('admin/unit/' . $value->id . '/edit') }}"
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
