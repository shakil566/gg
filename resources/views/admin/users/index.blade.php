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
                    <h1>@lang('english.USER')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard/admin') }}">@lang('english.DASHBOARD')</a></li>
                        <li class="breadcrumb-item active">@lang('english.USER')</li>
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
                            <h3 class="card-title">@lang('english.USER_DETAILS')</h3>
                            <a href="{{ url('admin/users/create') }}" class="btn btn-sm btn-info float-right">@lang('english.CREATE_NEW')</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>@lang('english.SL_NO')</th>
                                        {{-- <th>@lang('english.USER_GROUP')</th>
                                        <th>@lang('english.DESIGNATION')</th>
                                        <th>@lang('english.DEPARTMENT')</th> --}}
                                        <th class="username">@lang('english.USERNAME')</th>
                                        <th>@lang('english.EMAIL')</th>
                                        <th>@lang('english.NAME')</th>
                                        <th>@lang('english.PHOTO')</th>
                                        <th>@lang('english.STATUS')</th>
                                        <th>@lang('english.ACTION')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($usersArr))
                                    <?php
                                    $sl = 0;
                                    ?>
                                    @foreach ($usersArr as $value)
                                    <tr class="text-center">
                                        <td>{{ ++$sl }}</td>
                                        {{-- <td>{{$value->UserGroup->name}}</td>
                                        <td>{{(!empty($value->designation->title) ? $value->designation->title : '')}}</td>
                                        <td>{{$value->department->name ?? ''}}</td> --}}
                                        <td>{{ $value->username }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->first_name }} {{ $value->last_name }}</td>
                                        <td class="text-center">
                                            @if(isset($value->photo))
                                            <img width="100" height="100" src="{{URL::to('/')}}/public/uploads/user/{{$value->photo}}" alt="{{ $value->first_name.' '.$value->last_name }}">
                                            @else
                                            <img width="100" height="100" src="{{URL::to('/')}}/public/img/unknown.png" alt="{{ $value->first_name.' '.$value->last_name }}">
                                            @endif
                                        </td>
                                        <td>
                                            @if ($value->status == 'active')
                                                <span class="badge badge-success">@lang('english.ACTIVE')</span>
                                            @else
                                                <span class="badge badge-danger">@lang('english.INACTIVE')</span>
                                            @endif
                                        </td>

                                        <td>
                                            {{ Form::open(array('url' => 'admin/users/' . $value->id, 'id' => 'delete')) }}
                                            {{ Form::hidden('_method', 'DELETE') }}

                                            <?php
                                            $dd = Request::query();
                                            if (!empty($dd)) {
                                                $param = '';
                                                $sn = 1;

                                                foreach ($dd as $key => $item) {
                                                    if ($sn === 1) {
                                                        $param .= $key . '=' . $item;
                                                    } else {
                                                        $param .= '&' . $key . '=' . $item;
                                                    }
                                                    $sn++;
                                                } //foreach
                                            }
                                            ?>
                                            <a class='btn btn-info btn-xs tooltips' href="{{ URL::to('admin/users/activate/' . $value->id ) }}@if(isset($param)){{'/'.$param }} @endif" data-rel="tooltip" title="@if($value->status == 'active') Inactivate @else Activate @endif" data-container="body" data-trigger="hover" data-placement="top">
                                                @if($value->status == 'active')
                                                <i class='fa fa-times'></i>
                                                @else
                                                <i class='fa fa-check-circle'></i>
                                                @endif
                                            </a>
                                            <a class='btn btn-primary btn-xs tooltips' href="{{ URL::to('admin/users/' . $value->id . '/edit') }}" title="Edit User" data-container="body" data-trigger="hover" data-placement="top">
                                                <i class='fa fa-edit'></i>
                                            </a>
                                            {{-- <a class="tooltips" href="{{ URL::to('admin/users/cp/' . $value->id) }}@if(isset($param)){{'/'.$param }} @endif" data-original-title="Change Password">
                                                <span class="btn btn-success btn-xs">
                                                    <i class="fa fa-key"></i>
                                                </span>
                                            </a> --}}

                                            <button class="btn btn-danger btn-xs tooltips" type="submit" title="Delete" data-placement="top" data-rel="tooltip" data-original-title="Delete">
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
