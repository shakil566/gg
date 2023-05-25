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
                            <h3 class="card-title">@lang('english.UPDATE_USER_GROUP')</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{ Form::model($userGroup, array('route' => array('userGroup.update', $userGroup->id), 'method' => 'PATCH', 'class' => 'form-horizontal', 'id' => 'userGroupEditForm')) }}

                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">@lang('english.NAME')<span class="text-danger"> *</span></label>
                                {{ Form::text('name', Request::get('name'), ['id' => 'name', 'class' => 'form-control', 'placeholder' => 'Enter User Group Name']) }}
                                <span class="help-block text-danger"> {{ $errors->first('name') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="info">@lang('english.INFO')</label>
                                {{ Form::text('info', Request::get('info'), ['id' => 'info', 'class' => 'form-control', 'placeholder' => 'Enter User Group Info']) }}
                                <span class="help-block text-danger"> {{ $errors->first('info') }}</span>
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
                                {!! Form::select('status', ['1' => __('english.ACTIVE'), '2' => __('english.INACTIVE')], Request::get('status'), [
                                'class' => 'form-control select2',
                                'id' => 'statusId',
                                ]) !!}
                                <span class="help-block text-danger">{{ $errors->first('status') }}</span>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">@lang('english.SUBMIT')</button>
                            <a href="{{ URL::to('/admin/userGroup') }}" class="btn btn-default">@lang('english.CANCEL')</a>
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
