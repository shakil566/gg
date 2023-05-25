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
                                <h3 class="card-title">@lang('english.UPDATE_USER_PROFILE')</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {{ Form::open(array('role' => 'form', 'url' => 'admin/users/editProfile', 'files'=> true, 'class' => 'form-horizontal', 'id' => 'edit-profile')) }}

                            <div class="card-body">


                                <div class="form-group">
                                    <label for="UserFirstName">@lang('english.FIRST_NAME')<span class="text-danger"> *</span></label>
                                    {{ Form::text('first_name', Auth::user()->first_name, ['id' => 'UserFirstName', 'class' => 'form-control', 'placeholder' => 'Enter First Name']) }}
                                    <span class="help-block text-danger"> {{ $errors->first('first_name') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="UserLastName">@lang('english.LAST_NAME')<span class="text-danger"> *</span></label>
                                    {{ Form::text('last_name', Auth::user()->last_name, ['id' => 'UserLastName', 'class' => 'form-control', 'placeholder' => 'Enter Last Name']) }}
                                    <span class="help-block text-danger"> {{ $errors->first('last_name') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="userOfficialName">@lang('english.OFFICIAL_NAME')<span class="text-danger"> *</span></label>
                                    {{ Form::text('official_name', Auth::user()->official_name, ['id' => 'userOfficialName', 'class' => 'form-control', 'placeholder' => 'Enter Official Name']) }}
                                    <span class="help-block text-danger"> {{ $errors->first('official_name') }}</span>
                                </div>

                                <div class="form-group">
                                    <label for="userPhoneNumber">@lang('english.PHONE_NUMBER')</label>
                                    {{ Form::text('phone_no', Auth::user()->phone_no, ['id' => 'userPhoneNumber', 'class' => 'form-control', 'placeholder' => 'Enter Phone Number']) }}
                                    <span class="help-block text-danger"> {{ $errors->first('phone_no') }}</span>
                                </div>

                                <div class="form-group">
                                    <label for="photo">@lang('english.PHOTO')</label><br>
                                    @if (!empty(Auth::user()->photo))
                                        <img width="100" height="100" src="{{ URL::to('/') }}/public/uploads/user/{{Auth::user()->photo}}"
                                            alt="{{Auth::user()->official_name}}">
                                    @else
                                        <img width="100" height="100" src="{{ URL::to('/') }}/public/img/no_image.png" alt="">
                                    @endif
                                    {{ Form::file('photo', Request::get('photo'), ['class' => 'form-control', 'id' => 'photo', 'files' => 'true']) }}

                                    <span class="help-block text-danger">{{ $errors->first('photo') }}</span>
                                    <div class="clearfix margin-top-10">
                                        <span class="label label-danger">{{ trans('english.NOTE') }}</span>
                                        {{ trans('english.USER_AND_STUDENT_IMAGE_FOR_IMAGE_DESCRIPTION') }}
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <a href="{{ URL::to('/admin/users') }}" class="btn btn-default"><i class="fas fa-times"></i> @lang('english.CANCEL')</a>
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


@stop
