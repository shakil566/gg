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
                                <h3 class="card-title">@lang('english.UPDATE_PRODUCT_TYPE')</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {{ Form::model($productType, ['route' => ['productType.update', $productType->id], 'method' => 'PATCH', 'class' => 'form-horizontal', 'id' => 'productTypeUpdate', 'files' => true,]) }}

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">@lang('english.NAME')<span class="text-danger"> *</span></label>
                                    {{ Form::text('name', Request::get('name'), ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Enter product type name']) }}
                                    <span class="help-block text-danger"> {{ $errors->first('name') }}</span>
                                </div>

                                <div class="form-group">
                                    <label for="photo">@lang('english.PHOTO')</label><br>
                                    @if (!empty($productType->photo))
                                        <img width="100" height="100"
                                            src="{{ URL::to('/') }}/public/uploads/productType/{{ $productType->photo }}"
                                            alt="{{ $productType->name }}">
                                    @else
                                        <img width="100" height="100" src="{{ URL::to('/') }}/public/img/no_image.png"
                                            alt="">
                                    @endif
                                    {{ Form::file('photo', Request::get('photo'), ['class' => 'form-control', 'id' => 'photo', 'files' => 'true']) }}

                                    <span class="help-block text-danger">{{ $errors->first('photo') }}</span>
                                    <div class="clearfix margin-top-10">
                                        <span class="label label-danger">{{ trans('english.NOTE') }}</span>
                                        {{ trans('english.USER_AND_STUDENT_IMAGE_FOR_IMAGE_DESCRIPTION') }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="order">@lang('english.ORDER')</label>
                                    {!! Form::select('order', $orderList, null, [
                                        'class' => 'form-control select2',
                                        'id' => 'order',
                                    ]) !!}

                                    <span class="help-block text-danger"> {{ $errors->first('order') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="statusId">@lang('english.STATUS')</label>
                                    {!! Form::select(
                                        'status',
                                        ['1' => __('english.ACTIVE'), '2' => __('english.INACTIVE')],
                                        Request::get('status'),
                                        [
                                            'class' => 'form-control select2',
                                            'id' => 'statusId',
                                        ],
                                    ) !!}
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
