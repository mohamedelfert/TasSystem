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
                                                                <th class="wd-10p border-bottom-0">
                                                                    <span class="badge badge-pill badge-primary">{{ $detail->date }}</span>
                                                                </th>
                                                                <th class="wd-10p border-bottom-0">
                                                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cancel">
                                                                        {!! __('main.cancel') !!}
                                                                    </button>
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
    <div class="modal fade text-left" id="cancel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel1">{{__('main.cancel')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>{{__('main.cancel_record_msg')}}</h5>
                </div>
                <div class="modal-footer">
                    @php
                        $fineType = \App\Models\FineType::where('type','cancel')->first();
                    @endphp
                    <form method="get" action={{ route('teacher.orderCheckout',$fineType->price) }}>
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger">{!! __('main.cancel') !!}</button>
                    </form>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">{{__('main.close')}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection
