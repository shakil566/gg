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
                                <h3 class="card-title">@lang('english.CREATE_NEW_PRODUCT')</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {{ Form::open(['role' => 'form', 'url' => 'admin/product', 'class' => 'form-horizontal', 'id' => 'createProduct', 'files' => true]) }}

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">@lang('english.NAME')<span class="text-danger"> *</span></label>
                                    {{ Form::text('name', Request::old('name'), ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Enter Name']) }}
                                    <span class="help-block text-danger"> {{ $errors->first('name') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="code">@lang('english.CODE')<span class="text-danger"> *</span></label>
                                    {{ Form::text('code', Request::old('code'), ['id' => 'code', 'class' => 'form-control', 'placeholder' => 'Enter Code']) }}
                                    <span class="help-block text-danger"> {{ $errors->first('code') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="typeId">@lang('english.TYPE')<span class="text-danger"> *</span></label>
                                    {{ Form::select('type_id', $productTypeArr, Request::old('type_id'), ['class' => 'form-control select2', 'id' => 'typeId']) }}
                                    <span class="help-block text-danger">{{ $errors->first('type_id') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="categoryId">@lang('english.CATEGORY')<span class="text-danger"> *</span></label>
                                    {{ Form::select('category_id', $productCategoryArr, Request::old('category_id'), ['class' => 'form-control select2', 'id' => 'categoryId']) }}
                                    <span class="help-block text-danger">{{ $errors->first('category_id') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="brandId">@lang('english.BRAND')<span class="text-danger"> *</span></label>
                                    {{ Form::select('brand_id', $brandArr, Request::old('brand_id'), ['class' => 'form-control select2', 'id' => 'brandId']) }}
                                    <span class="help-block text-danger">{{ $errors->first('brand_id') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="unitId">@lang('english.UNIT')<span class="text-danger"> *</span></label>
                                    {{ Form::select('unit_id', $productUnitArr, Request::old('unit_id'), ['class' => 'form-control select2', 'id' => 'unitId']) }}
                                    <span class="help-block text-danger">{{ $errors->first('unit_id') }}</span>
                                </div>

                                <div class="form-group">
                                    <label for="shortDescription">@lang('english.DESCRIPTION')</label>
                                    {{ Form::textarea('short_description', Request::get('short_description'), ['id' => 'summernote', 'rows' => 2, 'cols' => 40, 'class' => 'f', 'placeholder' => 'Enter short description']) }}
                                    <span class="help-block text-danger"> {{ $errors->first('short_description') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="description">@lang('english.SHORT_DESCRIPTION')</label><br>
                                    {{ Form::textarea('description', Request::get('description'), ['id' => '', 'class' => '', 'placeholder' => 'Enter Description']) }}
                                    <span class="help-block text-danger"> {{ $errors->first('description') }}</span>
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
                                <a href="{{ URL::to('/admin/product') }}" class="btn btn-default"><i
                                        class="fas fa-times"></i> @lang('english.CANCEL')</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i>
                                    @lang('english.SUBMIT')</button>
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
