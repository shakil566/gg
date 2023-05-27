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
                                <h3 class="card-title">@lang('english.CREATE_NEW_PRODUCT_TYPE')</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {{ Form::open(['role' => 'form', 'url' => 'admin/productType', 'class' => 'form-horizontal', 'id' => 'createproductType', 'files' => true,]) }}

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">@lang('english.NAME')<span class="text-danger"> *</span></label>
                                    {{ Form::text('name', Request::get('name'), ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Enter product type name']) }}
                                    <span class="help-block text-danger"> {{ $errors->first('name') }}</span>
                                </div>

                                <div class="form-group">
                                    <label for="photo">@lang('english.PHOTO')</label><br>
                                    {{ Form::file('photo', Request::old('photo'), ['class' => 'form-control', 'id' => 'photo', 'files' => 'true']) }}

                                    <span class="help-block text-danger">{{ $errors->first('photo') }}</span>
                                    <div class="clearfix margin-top-10">
                                        <span class="label label-danger">{{ trans('english.NOTE') }}</span>
                                        {{ trans('english.USER_AND_STUDENT_IMAGE_FOR_IMAGE_DESCRIPTION') }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="order">@lang('english.ORDER')</label>
                                    {!! Form::select('order', $orderList, $lastOrderNumber, [
                                        'class' => 'form-control select2',
                                        'id' => 'order',
                                    ]) !!}

                                    <span class="help-block text-danger"> {{ $errors->first('order') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="statusId">@lang('english.STATUS')</label>
                                    {!! Form::select('status', ['1' => __('english.ACTIVE'), '2' => __('english.INACTIVE')], '1', [
                                        'class' => 'form-control select2',
                                        'id' => 'statusId',
                                    ]) !!}
                                    <span class="help-block text-danger">{{ $errors->first('status') }}</span>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <a href="{{ URL::to('/admin/productType') }}" class="btn btn-default"><i class="fas fa-times"></i> @lang('english.CANCEL')</a>
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
