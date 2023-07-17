@extends('dashboard.layouts.app')
@section('title'){!! __('Show Orders') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
    @include('dashboard.layouts.partials._breadcrumb',['level'=>'orders'])
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-2">
                                <div class="card-header pb-0">
                                    <div class="box-header with-border">
                                        <span style="display: block;margin-bottom:10px">@lang('orders') : <small>( {{ $orders->total() }} )</small></span>
                                        <form action="{{ route('admin.orders.index') }}" method="get">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" name="search" class="form-control" value="{{ request()->search }}"
                                                           placeholder="@lang('main.search')">
                                                </div>
                                                <div class="col-md-6">
                                                    <button class="btn btn-primary btn-sm" title="@lang('main.search')">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                    <a class="btn btn-danger btn-sm" href="{{ route('admin.orders.index') }}"
                                                       title="@lang('main.clear')">
                                                        <i class="fa fa-eraser"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <hr style="margin:10px 30px">
                                
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table text-md-nowrap" id="example1">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-5p border-bottom-0">#</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('Order Number') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('Subject') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('Teacher') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('Date') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('slot') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('Branch') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('Finish At') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('Price') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('status') !!}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($orders->count() > 0)
                                                        @foreach ($orders as $index => $order)
                                                            <tr>
                                                                <th class="wd-5p border-bottom-0">{{ $index + 1 }}</th>
                                                                <th class="wd-10p border-bottom-0">{{ $order->order_id }}</th>
                                                                <th class="wd-10p border-bottom-0">{{ optional($order->subject)->name }}</th>
                                                                <th class="wd-10p border-bottom-0">{{ optional($order->teacher)->first_name .' '. optional($order->teacher)->last_name }}</th>
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
                                                                    @if($order->status === 'accepted')
                                                                        <span class="badge badge-pill badge-primary">
                                                                            {{ $order->status }}
                                                                        </span>
                                                                    @elseif($order->status === 'cancelled')
                                                                        <span class="badge badge-pill badge-danger">
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
                                                                <td colspan="8" class="text-center text-danger">{!! __('No Data Found') !!}</td>
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
