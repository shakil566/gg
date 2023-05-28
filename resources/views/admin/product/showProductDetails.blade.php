<div class="modal-content">
    <div class="modal-header clone-modal-header">
        <div class="col-md-7 text-right">
            <h4 class="modal-title">@lang('english.PRODUCT_DETAILS')</h4>
        </div>
        <div class="col-md-5">
            {{-- <button type="button" data-dismiss="modal" data-placement="right" class="btn btn-danger pull-right tooltips" title="@lang('english.CLOSE_THIS_POPUP')">@lang('english.CLOSE')</button> --}}

        </div>
    </div>
    <div class="modal-body">

        <!--BASIC ORDER INFORMATION-->
        <div class="row div-box-default">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 border-bottom-1-green-seagreen">
                        <h4><strong>@lang('english.BASIC_INFORMATION')</strong></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-6">
                        <table class="table table-borderless">
                            <tr>
                                <td class="bold" width="50%">@lang('english.NAME')</td>
                                <td width="50%">{!! !empty($targetArr->name) ? $targetArr->name : '' !!}</td>
                            </tr>
                            <tr>
                                <td class="bold" width="50%">@lang('english.PRODUCT_TYPE')</td>
                                <td width="50%">{!! $targetArr->product_type ?? '' !!}</td>
                            </tr>
                            <tr>
                                <td class="bold" width="50%">@lang('english.CATEGORY')</td>
                                <td width="50%">{!! $targetArr->product_category ?? '' !!}</td>
                            </tr>

                            <tr>
                                <td class="bold" width="50%">@lang('english.BRAND')</td>
                                <td width="50%">{!! $targetArr->brand ?? '' !!}</td>
                            </tr>

                        </table>
                    </div>

                    <div class="col-md-6 col-lg-6 col-sm-6">
                        <table class="table table-borderless">
                            <tr>
                                <td class="bold" width="50%">@lang('english.CODE')</td>
                                <td width="50%">{!! !empty($targetArr->code) ? $targetArr->code : '' !!}</td>
                            </tr>
                            <tr>
                                <td class="bold" width="50%">@lang('english.UNIT')</td>
                                <td width="50%">{!! $targetArr->product_unit ?? '' !!}</td>
                            </tr>

                            <tr>
                                <td class="bold" width="50%">@lang('english.STATUS')</td>
                                <td width="50%">
                                    @if ($targetArr->status == '1')
                                        <span class="badge badge-success">@lang('english.ACTIVE')</span>
                                    @else
                                        <span class="badge badge-danger">@lang('english.INACTIVE')</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="bold" width="50%">@lang('english.PUBLISH')</td>
                                <td width="50%">
                                    @if ($targetArr->publish == '1')
                                        <span class="badge badge-success">@lang('english.PUBLISH')</span>
                                    @else
                                        <span class="badge badge-danger">@lang('english.UNPUBLISH')</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!--END OF BASIC ORDER INFORMATION-->

    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" data-placement="top" class="btn btn-danger btn-outline tooltips"
            title="@lang('english.CLOSE_THIS_POPUP')">@lang('english.CLOSE')</button>
    </div>
</div>

<script src="{{ asset('public/js/custom.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        $(".tooltips").tooltip();
    });
</script>
