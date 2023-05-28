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
                                <h3 class="card-title">@lang('english.SET_PRODUCT_IMAGE')</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {!! Form::open([
                                'group' => 'form',
                                'url' => 'admin/product/setProductImage',
                                'class' => 'form-horizontal',
                                'files' => true,
                            ]) !!}
                            {!! Form::hidden('product_id', $target->id) !!}
                            {{ csrf_field() }}

                            <div class="card-body">

                                <div class="form-body">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-info add-contact-person tooltips"
                                            title="@lang('english.CLICK_HERE_TO_ADD_MORE_IMAGE')">
                                            @lang('english.ADD_MORE_IMAGE')&nbsp; <i class="fa fa-plus"></i>
                                        </button>
                                        <div class="margin-top-10" id="newContactPerson">
                                            @if (!empty($imageArr))
                                                <?php
                                                $count = 1;
                                                ?>
                                                @foreach ($imageArr as $key => $image)
                                                    <div class="contact-person-div">
                                                        <div class="row">
                                                            <div class="col-md-12 dlt-btn">
                                                                <button
                                                                    class="btn badge badge-danger remove tooltips pull-right block-remove"
                                                                    data-count="{{ $count }}"
                                                                    title="@lang('english.CLICK_HERE_TO_DELETE_THIS_BLOCK')" type="button"
                                                                    id="deleteBtn_"{{ $count }}>
                                                                    &nbsp;@lang('english.DELETE')&nbsp;<i
                                                                        class="fa fa-remove"></i>
                                                                </button>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <label class="control-label col-md-2"
                                                                    for='productImage'.{{ $key }}>@lang('english.PHOTO')
                                                                    :</label>
                                                                <div class="col-md-8">
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="fileinput fileinput-new"
                                                                                data-provides="fileinput">
                                                                                <div class="fileinput-new thumbnail"
                                                                                    style="width: 150px; height: 120px;">

                                                                                    @if (!empty($image))
                                                                                        <img style="width: 150px; height: 120px;"
                                                                                            src="{{ URL::to('/') }}/public/uploads/product/{{ $image }}" />
                                                                                    @else
                                                                                        <img style="width: 150px; height: 120px;"
                                                                                            src="{{ URL::to('/') }}/public/img/unknown.png"
                                                                                            alt="">
                                                                                    @endif
                                                                                </div>
                                                                                {{-- <div class="fileinput-preview fileinput-exists thumbnail"
                                                                                    style="width: 150px; height: 120px;">
                                                                                </div> --}}

                                                                                {{-- <div>
                                                                                    <span
                                                                                        class="btn red btn-outline btn-file">
                                                                                        <span class="fileinput-new">
                                                                                            @lang('english.SELECT_IMAGE')
                                                                                        </span>
                                                                                        <span class="fileinput-exists">
                                                                                            @lang('english.CHANGE')
                                                                                        </span>
                                                                                        {!! Form::file('product_image[' . $key . ']', ['id' => 'productImage' . $key]) !!}

                                                                                    </span>
                                                                                    {!! Form::hidden('prev_suit_image[' . $key . ']', $image) !!}
                                                                                    <a href="javascript:;"
                                                                                        class="btn red fileinput-exists"
                                                                                        data-dismiss="fileinput">
                                                                                        @lang('english.REMOVE') </a>
                                                                                </div> --}}
                                                                            </div>
                                                                        </div>

                                                                        {{-- <div class="col-md-4">
                                                                            <div class="clearfix margin-top-10">
                                                                                <span
                                                                                    class="badge badge-success">@lang('english.NOTE')</span>
                                                                                <span
                                                                                    class="text-danger bold">@lang('english.CONTACT_IMAGE_FOR_IMAGE_DESCRIPTION')
                                                                                </span>
                                                                            </div>
                                                                        </div> --}}

                                                                    </div>
                                                                    <br>
                                                                        {!! Form::file('all_image[' . $key . ']', ['id' => 'image' . $key]) !!}
                                                                        {!! Form::hidden('prev_all_image[' . $key . ']', $image) !!}
                                                                        <div class="clearfix margin-top-10">
                                                                            <span
                                                                                class="badge badge-success">@lang('english.NOTE')</span>
                                                                            <span class="text-danger bold">@lang('english.CONTACT_IMAGE_FOR_IMAGE_DESCRIPTION')
                                                                            </span>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    $count++;
                                                    ?>
                                                @endforeach
                                            @else
                                            @endif
                                            {{-- <div class="no-image-block {{ !empty($imageArr) ? 'display-none' : '' }}">
                                                <div class="alert alert-danger">
                                                    <p>
                                                        <i class="fa fa-bell"></i>
                                                        @lang('english.NO_IMAGE_BLOCK_ADDED')
                                                    </p>
                                                </div>

                                            </div> --}}
                                        </div>
                                        <!-- END:: Contact Person Data -->
                                    </div>

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-4 col-md-8">
                                                <?php
                                                $btnColor = 'btn-danger';
                                                $btnIcon = 'times';
                                                $btnText = __('english.REMOVE_IMAGES_PERMANENTLY');
                                                if (!empty($imageArr)) {
                                                    $btnColor = 'green';
                                                    $btnIcon = 'check';
                                                    $btnText = __('english.SUBMIT');
                                                }
                                                ?>
                                                <button class="btn btn-primary {{ $btnColor }} btn-submit" type="submit">
                                                    <i class="fa fa-{{ $btnIcon }}"></i> {{ $btnText }}
                                                </button>
                                                <a href="{{ URL::to('/admin/product') }}"
                                                    class="btn btn-default grey-salsa">@lang('english.CANCEL')</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}

                            </div>
                            <!-- /.card-body -->
                            {{-- <div class="card-footer">
                                <a href="{{ URL::to('/admin/product') }}" class="btn btn-default"><i
                                        class="fas fa-times"></i> @lang('english.CANCEL')</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i>
                                    @lang('english.SUBMIT')</button>
                            </div> --}}

                            {{-- {{ Form::close() }} --}}
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
    <script src="{{ asset('public/backend') }}/plugins/jquery/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on("click", ".add-contact-person", function() {
                $.ajax({
                    url: "{{ route('product.newProductImage') }}",
                    type: "POST",
                    dataType: 'json', // what to expect back from the PHP script, if anything
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        $("#newContactPerson").prepend(res.html);
                        if (!$(".no-image-block").hasClass("display-none")) {
                            $(".no-image-block").addClass("display-none");
                            $(".btn-submit").removeClass("red-mint").addClass("green")
                                .html("<i class='fa fa-check'></i> @lang('english.SUBMIT')");
                        }
                        $(".tooltips").tooltip();
                    },
                });
            });
            $(document).on('click', '.remove', function() {
                $(this).parent().parent().parent().remove();
                if ($('#newContactPerson').find('.contact-person-div').length == 0) {
                    if ($(".no-image-block").hasClass("display-none")) {
                        $(".no-image-block").removeClass("display-none");
                        $(".btn-submit").removeClass("green").addClass("red-mint")
                            .html("<i class='fa fa-times'></i> @lang('english.REMOVE_IMAGES_PERMANENTLY')");
                    }
                }
                return false;
            });
        });
    </script>
@stop
