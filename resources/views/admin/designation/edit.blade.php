@extends('layouts.admin.master')
@section('admin_content')
    <!-- BEGIN CONTENT BODY -->
    <div class="content-wrapper">

        <!-- BEGIN PORTLET-->
        @include('layouts.admin.flash')
        <!-- END PORTLET-->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-8 margin-top-10">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">@lang('english.UPDATE_DESIGNATION')</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {{ Form::model($designation, array('route' => array('designation.update', $designation->id), 'method' => 'PATCH', 'class' => 'form-horizontal', 'id' => 'designationUpdate')) }}

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="desigName">@lang('english.TITLE')<span class="text-danger"> *</span></label>
                                    {{ Form::text('title', Request::get('title'), ['id' => 'desigName', 'class' => 'form-control', 'placeholder' => 'Enter Designation Title']) }}
                                    <span class="help-block text-danger"> {{ $errors->first('title') }}</span>
                                </div>

                                <div class="form-group">
                                    <label for="order">@lang('english.STATUS')</label>
                                    {!! Form::select('order', $orderList, null, [
                                        'class' => 'form-control select2',
                                        'id' => 'order',
                                    ]) !!}

                                    <span class="help-block text-danger"> {{ $errors->first('order') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="statusId">@lang('english.STATUS')</label>
                                    {!! Form::select('status', ['1' => __('english.ACTIVE'), '2' => __('english.INACTIVE')], Request::get('status'), [
                                        'class' => 'form-control select2',
                                        'id' => 'statusId',
                                    ]) !!}
                                    <span class="help-block text-danger">{{ $errors->first('status') }}</span>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <a href="{{ URL::to('/admin/designation') }}" class="btn btn-default"><i class="fas fa-times"></i> @lang('english.CANCEL')</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> @lang('english.SUBMIT')</button>
                            </div>
                            {{ Form::close() }}
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.row -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- END CONTENT BODY -->


@stop
