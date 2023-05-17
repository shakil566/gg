@extends('layouts.default')
@section('content')

<div class="page-content">
    @include('includes.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cubes"></i>{{trans('english.DEPARTMENT_LIST')}}
                    </div>
                    <div class="actions">
                        <a href="{{ URL::to('department/create') }}" class="btn btn-default btn-sm">
                            <i class="fa fa-plus"></i> {{trans('english.CREATE_NEW_DEPARTMENT')}} </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        {!! Form::open(['group' => 'form', 'url' => 'department/filter', 'class' => 'form-horizontal']) !!}
                        {!! Form::hidden('filter', Helper::queryPageStr($qpArr)) !!}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label col-md-4" for="search">@lang('english.SEARCH')</label>
                                <div class="col-md-8">
                                    {!! Form::text('fil_search', Request::get('fil_search'), [
                                        'class' => 'form-control tooltips',
                                        'title' => 'Title',
                                        'placeholder' => 'Name',
                                        'list' => 'Title',
                                        'autocomplete' => 'off',
                                    ]) !!}

                                    <datalist id="Title">
                                        @if (!$nameArr->isEmpty())
                                            @foreach ($nameArr as $item)
                                                <option value="{{ $item->name }}" />
                                            @endforeach
                                        @endif
                                    </datalist>

                                </div>
                            </div>
                        </div>



                        <div class="col-md-2">
                            <button type="submit" class="btn btn-md green btn-outline filter-submit margin-bottom-20">
                                <i class="fa fa-search"></i> {{trans('english.FILTER')}}
                            </button>
                        </div>
                    </div>
                    {{Form::close()}}
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>{{trans('english.SL_NO')}}</th>
                                    <th>{{trans('english.NAME')}}</th>
                                    <th class="text-center">{{trans('english.ORDER')}}</th>
                                    <th class="text-center">{{trans('english.STATUS')}}</th>
                                    <th class="text-center">{{trans('english.ACTION')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!$targetArr->isEmpty())
                                <?php
                                $page = Request::get('page');
                                $page = empty($page) ? 1 : $page;
                                $sl = ($page - 1) * trans('english.PAGINATION_COUNT');
                                ?>
                                @foreach($targetArr as $value)

                                <tr class="contain-center">
                                    <td>{{ ++$sl}}</td>
                                    <td>{{ $value->name}}</td>
                                    <td class="text-center">{{ $value->order }}</td>
                                    <td class="text-center">
                                        @if ($value->status == '1')
                                        <span class="label label-success">{{ trans('english.ACTIVE') }}</span>
                                        @else
                                        <span class="label label-warning">{{ trans('english.INACTIVE') }}</span>
                                        @endif
                                    </td>

                                    <td class="action-center">
                                        <div class='text-center'>
                                            {{ Form::open(array('url' => 'department/' . $value->id, 'id' => 'delete')) }}
                                            {{ Form::hidden('_method', 'DELETE') }}

                                            <a class="btn btn-primary btn-xs" href="{{ URL::to('department/' . $value->id . '/edit') }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button class="btn btn-danger btn-xs" type="submit" data-placement="top" data-rel="tooltip" data-original-title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            {{ Form::close() }}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="7">{{trans('english.EMPTY_DATA')}}</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>

                    </div>
                    <div class="row">
                        <div class="col-md-5 col-sm-5">
                            <div class="dataTables_info" role="status" aria-live="polite">
                                <?php
                                $start = empty($targetArr->total()) ? 0 : (($targetArr->currentPage() - 1) * $targetArr->perPage() + 1);
                                $end = ($targetArr->currentPage() * $targetArr->perPage() > $targetArr->total()) ? $targetArr->total() : ($targetArr->currentPage() * $targetArr->perPage());
                                ?> <br />
                                @lang('english.SHOWING') {{ $start }} @lang('english.TO') {{$end}} @lang('english.OF')  {{$targetArr->total()}} @lang('english.RECORDS')

                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7">
                            {{ $targetArr->appends(Request::all())->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT BODY -->
<script type="text/javascript">
    $(document).on("submit", '#delete', function (e) {
        //This function use for sweetalert confirm message
        e.preventDefault();
        var form = this;
        swal({
            title: 'Are you sure you want to Delete?',
            text: '',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete",
            closeOnConfirm: false
        },
                function (isConfirm) {
                    if (isConfirm) {
                        toastr.info("Loading...", "Please Wait.", {"closeButton": true});
                        form.submit();
                    } else {
                        //swal(sa_popupTitleCancel, sa_popupMessageCancel, "error");

                    }
                });
    });
</script>
@stop
