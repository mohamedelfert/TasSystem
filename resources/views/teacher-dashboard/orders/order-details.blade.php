@extends('teacher-dashboard.layouts.app')
@section('title'){!! __('main.orders') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
    @include('teacher-dashboard.layouts.partials._breadcrumb',['level'=>'orders'])
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    {!! __('main.order_details') !!}
                                </div>
                                <hr>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table text-md-nowrap" id="example1">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-5p border-bottom-0">#</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('main.slot') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('main.app_detail_id') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('main.date') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('main.options') !!}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($orderDetails->count() > 0)
                                                        @foreach ($orderDetails as $index => $detail)
                                                            <tr>
                                                                <th class="wd-5p border-bottom-0">{{ $index + 1 }}</th>
                                                                <th class="wd-10p border-bottom-0">
                                                                    <span class="badge badge-pill badge-secondary">
                                                                        {{ Carbon\Carbon::parse(optional($detail->slot)->start_at)->format('g:i A') .' - '. Carbon\Carbon::parse(optional($detail->slot)->end_at)->format('g:i A') }}
                                                                    </span>
                                                                </th>
                                                                <th class="wd-5p border-bottom-0">{{ $detail->app_detail_id }}</th>
                                                                <th class="wd-10p border-bottom-0">
                                                                    <span class="badge badge-pill badge-primary">{{ $detail->date }}</span>
                                                                </th>
                                                                <th class="wd-10p border-bottom-0">
                                                                    <a class="btn btn-danger btn-sm" data-effect="effect-scale"data-toggle="modal"
                                                                       href="#cancel" title="{!! __('main.cancel') !!}"
                                                                       data-id="{{ $detail->id }}"
                                                                       data-slot="{{ Carbon\Carbon::parse(optional($detail->slot)->start_at)->format('g:i A') .' - '. Carbon\Carbon::parse(optional($detail->slot)->end_at)->format('g:i A') }}"
                                                                       data-date="{{ $detail->date }}">
                                                                        {!! __('main.cancel') !!}
                                                                    </a>
                                                                </th>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="8" class="text-center text-danger">{!! __('main.no_data_found') !!}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="cancel">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">{{__('main.cancel')}}</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                @php
                    $fineType = \App\Models\FineType::where('type','cancel')->first();
                @endphp
                <form action="{{ route('teacher.orderCheckout',$fineType->price) }}" method="get">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>{{__('main.cancel_record_msg')}}</p><br>
                        <input type="hidden" name="fine_type_id" id="fine_type_id" value="{{ $fineType->id }}">
                        <input type="hidden" name="id" id="id" value="">
                        <input type="text" class="form-control mb-2" name="slot" id="slot" value="" disabled="disabled">
                        <input type="text" class="form-control" name="date" id="date" value="" disabled="disabled">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="cancel" class="btn btn-danger">{{__('main.confirm')}}</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">{{__('main.close')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
@endsection
@section('footer')
    <script>
        $('#cancel').on('show.bs.modal', function(event) {
            let button = $(event.relatedTarget)
            let id = button.data('id')
            let slot = button.data('slot')
            let date = button.data('date')
            let modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #slot').val(slot);
            modal.find('.modal-body #date').val(date);
        })
    </script>
@endsection
