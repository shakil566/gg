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
                        <h1>@lang('english.PRODUCT')</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/dashboard/admin') }}">@lang('english.DASHBOARD')</a></li>
                            <li class="breadcrumb-item active">@lang('english.PRODUCT')</li>
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
                                <h3 class="card-title">@lang('english.PRODUCT_DETAILS')</h3>
                                <a href="{{ url('admin/product/create') }}"
                                    class="btn btn-sm btn-info float-right">@lang('english.CREATE_NEW')</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="dataTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>@lang('english.SL_NO')</th>
                                            <th>@lang('english.NAME')</th>
                                            <th>@lang('english.CODE')</th>
                                            <th>@lang('english.PHOTO')</th>
                                            <th>@lang('english.TYPE')</th>
                                            <th>@lang('english.CATEGORY')</th>
                                            <th>@lang('english.BRAND')</th>
                                            <th>@lang('english.UNIT')</th>
                                            <th>@lang('english.PUBLISH')</th>
                                            <th>@lang('english.STATUS')</th>
                                            <th>@lang('english.ACTION')</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @if (!empty($targetArr))
                                            <?php
                                            $sl = 0;
                                            ?>
                                            @foreach ($targetArr as $value)
                                                <tr class="text-center">
                                                    <td>{{ ++$sl }}</td>
                                                    <td>{{ $value->name ?? '' }}
                                                    </td>
                                                    <td>{{ $value->code ?? '' }}</td>
                                                    <td class="text-center">
                                                        @if(isset($value->photo))
                                                        <img width="100" height="100" src="{{URL::to('/')}}/public/uploads/product/{{$value->photo}}" alt="{{ $value->name}}">
                                                        @else
                                                        <img width="100" height="100" src="{{URL::to('/')}}/public/img/no_image.png" alt="{{ $value->name}}">
                                                        @endif
                                                    </td>
                                                    <td>{{ $value->product_type ?? '' }}</td>
                                                    <td>{{ $value->product_category ?? '' }}</td>
                                                    <td>{{ $value->brand ?? '' }}</td>
                                                    <td>{{ $value->product_unit ?? '' }}</td>
                                                    <td>
                                                        <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">

                                                        {{-- <div class="md-checkbox has-success ">
                                                            {!! Form::checkbox('publish', $value->publish, !empty($value->publish) ? '1' : null,['class' => 'make-switch publish-switch', 'data-on-text'=> '<i class="fa fa-paper-plane tooltips" title="PUBLISH"></i>'
                                                            ,'data-off-text'=>'<i class="fa fa-paper-plane-o tooltips" title="UNPUBLISH"></i>','data-id'=>$value->id]) !!}
                                                        </div> --}}
                                                    </td>
                                                    <td>
                                                        @if ($value->status == '1')
                                                            <span class="badge badge-success">@lang('english.ACTIVE')</span>
                                                        @else
                                                            <span class="badge badge-danger">@lang('english.INACTIVE')</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <a class="btn btn-secondary btn-xs tooltips set-product-image" href="{{ URL::to('admin/product/' . $value->id . '/getProductImage') }}"  title="@lang('label.SET_PRODUCT_IMAGE')">
                                                            <i class="fa fa-image"></i>
                                                        </a>
                                                        <button class="btn btn-info btn-xs tooltips details-btn" data-id="{!! $value->id !!}"  data-toggle="modal" title="@lang('label.PRODUCT_DETAILS')"  data-target="#productDetails" data-toggle="modal" data-id="{{$value->id}}">
                                                            <i class="fa fa-eye text-white"></i>
                                                        </button>
                                                        <a class='btn btn-primary btn-xs'
                                                            href="{{ URL::to('admin/product/' . $value->id . '/edit') }}"
                                                            title="{{ trans('english.EDIT') }}">
                                                            <i class='fa fa-edit'></i>
                                                        </a>
                                                        {{ Form::open(['url' => 'admin/product/' . $value->id, 'id' => 'delete']) }}
                                                        {{ Form::hidden('_method', 'DELETE') }}

                                                        <button class="btn btn-danger btn-xs" type="submit"
                                                            title="{{ trans('english.DELETE') }}" data-placement="top"
                                                            data-rel="tooltip" data-original-title="Delete">
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


    <!-- Modal start -->

<!--set product image modal-->
<div class="modal fade" id="modalSetProductImage" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div id="showSetProductImage">
        </div>
    </div>
</div>

<!--product details-->
<div class="modal fade" id="productDetails" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div id="showProductDetails">

        </div>
    </div>
</div>

<!-- Modal end-->
<script src="{{ asset('public/backend') }}/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    </script>
<script type="text/javascript">

    $(document).on('switchChange.bootstrapSwitch', '.publish-switch', function () {
        var productId = $(this).attr("data-id");
        var publish = '0';
        if ($(this).prop("checked") == true) {
            publish = '1';
        }
        var options = {
            closeButton: true,
            debug: false,
            positionClass: "toast-bottom-right",
            onclick: null,
        };
        $.ajax({
            url: "{{URL::to('admin/product/setPublish')}}",
            type: "POST",
            datatype: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                publish: publish,
                product_id: productId,
            },
            beforeSend: function () {
                App.blockUI({boxed: true});
            },
            success: function (res) {
                toastr.success(res.message, res.heading, options);

                App.unblockUI();
            },
            error: function (jqXhr, ajaxOptions, thrownError) {
                if (jqXhr.status == 400) {
                    var errorsHtml = '';
                    var errors = jqXhr.responseJSON.message;
                    $.each(errors, function (key, value) {
                        errorsHtml += '<li>' + value + '</li>';
                    });
                    toastr.error(errorsHtml, jqXhr.responseJSON.heading, options);
                } else if (jqXhr.status == 401) {
                    toastr.error(jqXhr.responseJSON.message, '', options);
                } else {
                    toastr.error('Error', 'Something went wrong', options);
                }
                App.unblockUI();
            }
        });
    });

     $(document).on('click', '.details-btn', function () {

        var productId = $(this).attr("data-id");
        //alert(refNo);return false;
        $.ajax({
            url: "{{URL::to('admin/product/getProductDetails')}}",
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                product_id: productId,
            },
            beforeSend: function () {
                // App.blockUI({boxed: true});
            },
            success: function (res) {
                $('#showProductDetails').html(res.html);
                // App.unblockUI();
            },
        });
    });


</script>
@stop
