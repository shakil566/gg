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
                            <h3 class="card-title">@lang('english.CREATE_NEW_USER')</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{ Form::open(['role' => 'form', 'url' => 'admin/users', 'class' => 'form-horizontal', 'id' => 'createUsers']) }}

                        <div class="card-body">

                            <div class="form-group">
                                <label for="userGroupId">@lang('english.SELECT_GROUP')</label>
                                {{ Form::select('group_id', $groupList, Request::old('group_id'), array('class' => 'form-control select2', 'id' => 'userGroupId')) }}
                                <span class="help-block text-danger">{{ $errors->first('group_id') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="userDesignationId">@lang('english.SELECT_DESIGNATION')</label>
                                {{Form::select('designation_id', $designationList, Request::old('designation_id'), array('class' => 'form-control select2', 'id' => 'userDesignationId'))}}
                                <span class="help-block text-danger">{{ $errors->first('designation_id') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="userDepartmentId">@lang('english.SELECT_DEPARTMENT')</label>
                                {{ Form::select('department_id', $departmentList, Request::old('department_id'), array('class' => 'form-control select2', 'id' => 'userDepartmentId')) }}
                                <span class="help-block text-danger">{{ $errors->first('department_id') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="UserFirstName">@lang('english.FIRST_NAME')</label>
                                {{ Form::text('first_name', Request::old('first_name'), array('id'=> 'UserFirstName', 'class' => 'form-control', 'placeholder' => 'Enter First Name')) }}
                                <span class="help-block text-danger"> {{ $errors->first('first_name') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="UserLastName">@lang('english.LAST_NAME')</label>
                                {{ Form::text('last_name', Request::old('last_name'), array('id'=> 'UserLastName', 'class' => 'form-control', 'placeholder' => 'Enter Last Name', 'required' => 'true')) }}
                                <span class="help-block text-danger"> {{ $errors->first('last_name') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="userOfficialName">@lang('english.OFFICIAL_NAME')</label>
                                {{ Form::text('official_name', Request::old('official_name'), array('id'=> 'userOfficialName', 'class' => 'form-control', 'placeholder' => 'Enter Official Name', 'required' => 'true')) }}
                                <span class="help-block text-danger"> {{ $errors->first('official_name') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="userOfficialName">@lang('english.USERNAME')</label>
                                {{ Form::text('username', Request::old('username'), array('id'=> 'username', 'placeholder' => 'Enter Username', 'class' => 'form-control')) }}
                                <span class="help-block text-danger"> {{ $errors->first('username') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="UserPassword">@lang('english.PASSWORD')</label>
                                {{ Form::password('password', array('id'=> 'UserPassword', 'class' => 'form-control', 'placeholder' => 'Password', 'required' => 'true')) }}
                                <span class="input-group-addon">
                                    <i class="fa fa-key"></i>
                                </span>
                                <span class="help-block">{{ trans('english.COMPLEX_PASSWORD_INSTRUCTION') }}</span>
                                <span class="help-block text-danger"> {{ $errors->first('password') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="UserPassword">@lang('english.CONFIRM_PASSWORD')</label>
                                {{ Form::password('password_confirmation', array('id'=> 'UserConfirmPassword', 'class' => 'form-control', 'placeholder' => 'Confirm Password', 'required' => 'true')) }}
                                <span class="input-group-addon">
                                    <i class="fa fa-key"></i>
                                </span>
                                <span class="help-block text-danger"> {{ $errors->first('password_confirmation') }}</span>

                            </div>

                            <div class="form-group">
                                <label for="UserEmail">@lang('english.EMAIL')</label>
                                {{ Form::email('email', Request::old('email'), array('id'=> 'UserEmail', 'placeholder' => 'Email Address', 'class' => 'form-control')) }}
                                <span class="help-block text-danger"> {{ $errors->first('email') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="userPhoneNumber">@lang('english.PHONE_NUMBER')</label>
                                {{ Form::text('phone_no',Request::old('phone_no'), array('id'=> 'userPhoneNumber', 'class' => 'form-control', 'placeholder' => 'Enter Phone Number')) }}
                                <span class="help-block text-danger"> {{ $errors->first('phone_no') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="userStatus">@lang('english.STATUS')</label>
                                {{ Form::select('status', $status, Request::old('status'), array('class' => 'form-control select2', 'id' => 'userStatus')) }}
                                <span class="help-block text-danger">{{ $errors->first('status') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="userStatus">@lang('english.PHOTO')</label>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="{{URL::to('/')}}/public/img/no-image.png" alt="">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                    <div>
                                        <span class="btn default btn-file">
                                            <span class="fileinput-new"> Select image </span>
                                            <span class="fileinput-exists"> Change </span>
                                            {{Form::file('photo', array('id' => 'sortpicture'))}}
                                        </span>
                                        <span class="help-block text-danger">{{ $errors->first('photo') }}</span>
                                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> {{trans('english.REMOVE')}} </a>
                                    </div>
                                </div>
                                <div class="clearfix margin-top-10">
                                    <span class="label label-danger">{{trans('english.NOTE')}}</span> {{trans('english.USER_AND_STUDENT_IMAGE_FOR_IMAGE_DESCRIPTION')}}
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">@lang('english.SUBMIT')</button>
                            <a href="{{ URL::to('/admin/users') }}" class="btn btn-default">@lang('english.CANCEL')</a>
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


@stop
