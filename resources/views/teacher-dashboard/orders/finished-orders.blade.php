@extends('teacher-dashboard.layouts.app')
@section('title'){!! __('main.finished_orders') !!}@endsection
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
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table text-md-nowrap" id="example1">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-5p border-bottom-0">#</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('main.order_number') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('main.subject') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('main.date') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('main.slot') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('main.branch') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('main.finished_at') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('main.price') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('main.final_price') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('main.status') !!}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($orders->count() > 0)
                                                        @foreach ($orders as $index => $order)
                                                            <tr>
                                                                <th class="wd-5p border-bottom-0">{{ $index + 1 }}</th>
                                                                <th class="wd-10p border-bottom-0">{{ $order->order_id }}</th>
                                                                <th class="wd-10p border-bottom-0">{{ optional($order->subject)->name }}</th>
                                                                <th class="wd-10p border-bottom-0">
                                                                    <span class="badge badge-pill badge-primary">{{ $order->date }}</span>
                                                                </th>
                                                                <th class="wd-10p border-bottom-0">
                                                                    <span class="badge badge-pill badge-secondary">
                                                                        {{ optional($order->slot)->name }}
                                                                    </span>
                                                                </th>
                                                                <th class="wd-10p border-bottom-0">
                                                                    <span class="badge badge-pill badge-light-danger">
                                                                        {{ optional($order->branch)->name }}
                                                                    </span>
                                                                </th>
                                                                <th class="wd-10p border-bottom-0">{{ $order->finished_at }}</th>
                                                                <th class="wd-10p border-bottom-0">
                                                                    <span class="badge badge-pill badge-warning">
                                                                        {{ $order->price }} $
                                                                    </span>
                                                                </th>
                                                                <th class="wd-10p border-bottom-0">
                                                                    <span class="badge badge-pill badge-light-warning">
                                                                        {{ $order->final_price }} $
                                                                    </span>
                                                                </th>
                                                                <th class="wd-10p border-bottom-0">
                                                                    @if($order->status === 'accepted')
                                                                        <span class="badge badge-pill badge-primary">
                                                                            {{ $order->status }}
                                                                        </span>
                                                                    @elseif($order->status === 'cancelled')
                                                                        <span class="badge badge-pill badge-danger">
                                                                            {{ $order->status }}
                                                                        </span>
                                                                    @else
                                                                        <span class="badge badge-pill badge-warning">
                                                                            {{ $order->status }}
                                                                        </span>
                                                                    @endif
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
@endsection
