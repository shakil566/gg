<?php
$v3 = 'z' . uniqid();
?>
<div class="contact-person-div">
    <div class="row">
        <div class="col-md-12 dlt-btn">
            {{-- <button class="badge badge-danger remove pull-right block-remove" title="@lang('english.CLICK_HERE_TO_DELETE_THIS_BLOCK')" type="button">
                &nbsp;@lang('english.DELETE')&nbsp;<i class="fa fa-remove"></i>
            </button> --}}
            <span class="btn badge badge-danger remove pull-right block-remove"
                title="@lang('english.CLICK_HERE_TO_DELETE_THIS_BLOCK')">@lang('english.DELETE')&nbsp;<i class="fa fa-remove"></i></span>
        </div>
    </div>

    <div class="form-group">
        <div class="row">
            <label class="control-label col-md-2" for='contactPhoto'.{{ $v3 }}>@lang('english.PHOTO') :</label>
            {!! Form::file('all_image[' . $v3 . ']', ['id' => 'productImage' . $v3]) !!}

            <div class="clearfix margin-top-10">
                <span class="badge badge-success">@lang('english.NOTE')</span> <span
                    class="text-danger bold">@lang('english.CONTACT_IMAGE_FOR_IMAGE_DESCRIPTION') </span>
            </div>
            {{-- <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 150px; height: 120px;">

                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail"
                                style="width: 150px; height: 120px;"> </div>
                            <div>
                                <span class="btn red btn-outline btn-file">
                                    <span class="fileinput-new"> @lang('english.SELECT_IMAGE') </span>
                                    <span class="fileinput-exists"> @lang('english.CHANGE') </span>
                                    {!! Form::file('product_image[' . $v3 . ']', ['id' => 'productImage' . $v3]) !!}
                                </span>
                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                                    @lang('english.REMOVE') </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="clearfix margin-top-10">
                            <span class="badge badge-success">@lang('english.NOTE')</span> <span
                                class="text-danger bold">@lang('english.CONTACT_IMAGE_FOR_IMAGE_DESCRIPTION') </span>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>


</div>
<script src="{{ asset('public/js/custom.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.remove', function() {
            $(this).parent().parent().remove();
            return false;
        });
    });
</script>
