<div class="modal-content">
    <div class="modal-header clone-modal-header">
        <div class="col-md-7 text-right">
            <h4 class="modal-title">@lang('label.PRODUCT_DETAILS')</h4>
        </div>
        <div class="col-md-5">
            <button type="button" data-dismiss="modal" data-placement="left" class="btn red pull-right tooltips" title="@lang('label.CLOSE_THIS_POPUP')">@lang('label.CLOSE')</button>

        </div>
    </div>
    <div class="modal-body">

        <!--BASIC ORDER INFORMATION-->
        <div class="row div-box-default">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 border-bottom-1-green-seagreen">
                        <h4><strong>@lang('label.BASIC_INFORMATION')</strong></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-6">
                        <table class="table table-borderless">
                            <tr>
                                <td class="bold"  width="50%">@lang('label.NAME')</td>
                                <td width="50%">{!! !empty($targetArr->name)? $targetArr->name:'' !!}</td>
                            </tr>
                            <tr>
                                <td class="bold"  width="50%">@lang('label.CODE')</td>
                                <td width="50%">{!! !empty($targetArr->product_code)?$targetArr->product_code:'' !!}</td>
                            </tr>
                            <tr>
                                <td class="bold"  width="50%">@lang('label.BRAND')</td>
                                <td width="50%">{!! !empty($targetArr->brand)?$targetArr->brand:'' !!}</td>
                            </tr>
                            <tr>
                                <td class="bold"  width="50%">@lang('label.UNIT')</td>
                                <td width="50%"><span class="label label-info">{!! !empty($targetArr->product_unit)?$targetArr->product_unit:'' !!}</span></td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-md-6 col-lg-6 col-sm-6">
                        <table class="table table-borderless">
                            <tr>
                                <td class="bold"  width="50%">@lang('label.CATEGORY')</td>
                                <td width="50%">{!! !empty($targetArr->product_category)?$targetArr->product_category:'' !!}</td>
                            </tr>
                            <tr>
                                <td class="bold"  width="50%">@lang('label.PRODUCT_TYPE')</td>
                                <td width="50%">{!! !empty($targetArr->product_type_id) && !empty($productTypeArr[$targetArr->product_type_id]) ? $productTypeArr[$targetArr->product_type_id] : '' !!}</td>
                            </tr>
                            <tr>
                                <td class="bold"  width="50%">@lang('label.STATUS')</td>
                                <td width="50%">
                                    @if($targetArr->status == '1')
                                    <span class="label label-sm label-success">@lang('label.ACTIVE')</span>
                                    @else
                                    <span class="label label-sm label-warning">@lang('label.INACTIVE')</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="bold"  width="50%">@lang('label.PUBLISH')</td>
                                <td width="50%">
                                    @if($targetArr->publish == '1')
                                    <span class="label label-sm label-info">@lang('label.PUBLISH')</span>
                                    @else
                                    <span class="label label-sm label-danger">@lang('label.UNPUBLISH')</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!--END OF BASIC ORDER INFORMATION-->

        <!--LC INFORMATION-->
        <div class="row div-box-default">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 border-bottom-1-green-seagreen">
                        <h4><strong>@lang('label.MEASUREMENT_INFORMATION')</strong></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-borderless">
                            <tr>
                                <td class="bold text-center" width="25%">@lang('label.LENGTH')</td>
                                <td class="bold text-center" width="25%">@lang('label.HEIGHT')</td>
                                <td class="bold text-center" width="25%">@lang('label.WIDTH')</td>
                                <td class="bold text-center" width="25%">@lang('label.WEIGHT')</td>

                            </tr>
                            <tr>
                                <td class="text-center">{!! !empty($targetArr->length)? $targetArr->length : '' !!}</td>
                                <td class="text-center">{!! !empty($targetArr->height)? $targetArr->height : '' !!}</td>
                                <td class="text-center">{!! !empty($targetArr->width)? $targetArr->width : '' !!}</td>
                                <td class="text-center">{!! !empty($targetArr->weight)? $targetArr->weight : '' !!}</td>

                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--END OF LC INFORMATION-->
        <div class="row div-box-default">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 border-bottom-1-green-seagreen">
                        <h4><strong>@lang('label.SKU_INFORMATION')</strong></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-sm-6">
                        <table class="table table-borderless">
                            <tr>
                                <td class="bold"  width="50%">@lang('label.SKU_CODE')</td>
                                <td width="50%" class="text-center">{!! !empty($targetArr->sku)? $targetArr->sku:'' !!}</td>
                            </tr>

                            <tr>
                                <td class="bold"  width="50%">@lang('label.REORDER_LEVEL')</td>
                                <td width="50%" class="text-center">{!! !empty($targetArr->reorder_level)?$targetArr->reorder_level:'' !!}</td>
                            </tr> 
                        </table>
                    </div>

                    <div class="col-md-6 col-lg-6 col-sm-6">
                        <table class="table table-borderless">
                            <tr>
                                <td class="bold"  width="50%">@lang('label.SELLING_PRICE')</td>
                                <td width="50%" class="text-center">{!! !empty($targetArr->selling_price)?$targetArr->selling_price:'' !!}</td>
                            </tr>
                            <tr>
                                <td class="bold"  width="50%">@lang('label.PURCHASE_PRICE')</td>
                                <td width="50%" class="text-center">{!! !empty($targetArr->purchase_price)? $targetArr->purchase_price : '' !!}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <button type="button" data-dismiss="modal" data-placement="top" class="btn dark btn-outline tooltips" title="@lang('label.CLOSE_THIS_POPUP')">@lang('label.CLOSE')</button>
    </div>
</div>

<script src="{{asset('public/js/custom.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $(".tooltips").tooltip();
    });
</script>