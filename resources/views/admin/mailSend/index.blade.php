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
                                <h3 class="card-title">Send mail to All User</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {{ Form::open(['role' => 'form', 'url' => 'admin/sendMail/send', 'class' => 'form-horizontal', 'id' => 'sendMail']) }}

                            <div class="card-body">
                                <p>Working here with Mail, Notification, Queue, Event Listener</p>
                                <div class="form-group">
                                    <label for="subject">Subject<span class="text-danger"> *</span></label>
                                    {{ Form::text('subject', Request::get('subject'), ['id' => 'subject', 'class' => 'form-control', 'placeholder' => 'Enter Main Subject']) }}
                                    <span class="help-block text-danger"> {{ $errors->first('subject') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="description">Body<span class="text-danger"> *</span></label>
                                    {{ Form::textarea('description', Request::get('description'), ['id' => 'summernote', 'class' => '', 'placeholder' => 'Enter Main Subject']) }}
                                    <span class="help-block text-danger"> {{ $errors->first('description') }}</span>
                                </div>

                                <div class="form-group">
                                    <label for="userId">USER<span class="text-danger"> *</span></label><br>
                                    <div>
                                        {!! Form::select('user_id[]', $userArr, Request::old('user_id'), [
                                            'class' => 'form-control',
                                            'multiple' => 'multiple',
                                            'id' => 'multiselect',
                                        ]) !!}
                                    </div>


                                    <span class="help-block text-danger"> {{ $errors->first('user_id') }}</span>
                                </div>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="#" class="btn btn-default"><i class="fas fa-times"></i> @lang('english.CANCEL')</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> @lang('english.SEND')</button>
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
