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
                                    <div class="tabs-menu1">
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab1" class="nav-link active" data-toggle="tab">{!! __('main.checkout') !!}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                            <div class="main-contact-info-body p-4">
                                                <div class="row">
                                                    <div class="col-12 col-md-12 col-lg-12 order-1 order-md-1">
                                                        <div class="media-list pb-0">
                                                            <div class="row">
                                                                <div class="media col-12 col-md-12 col-lg-12">
                                                                    <div class="media-body">
                                                                        <div class="alert alert-warning text-center mb-2 col-12 col-md-12 col-lg-12">
                                                                            {{ __('main.slot_cancel_record') }}<strong>$ {{ $price }}</strong>
                                                                            {{ __('main.or_you_can') }}
                                                                            <a href="{{ route('teacher.orders.index') }}">{{ __('main.go_back') }}</a>
                                                                        </div>

                                                                        <div class="alert alert-secondary text-center mb-2 col-12 col-md-12 col-lg-12">
                                                                            <strong class="text-dark">{{ __('main.slot') }} : </strong><strong class="text-danger">{{ Carbon\Carbon::parse(optional($orderDetail->slot)->start_at)->format('g:i A') .' - '. Carbon\Carbon::parse(optional($orderDetail->slot)->end_at)->format('g:i A') }}</strong><br>
                                                                            <strong class="text-dark">{{ __('main.date') }} : </strong><strong class="text-danger">{{ $orderDetail->date }}</strong><br>
                                                                        </div>

                                                                        <div class="mb-2 col-12 col-md-12 col-lg-12">
                                                                            <form action="{{ route('teacher.orderFinePay') }}" method="post" id="payment-form">
                                                                                @csrf
                                                                                <div>
                                                                                    <input type="hidden" name="price" value="{{ $price }}"/>
                                                                                    <input type="hidden" name="fine_type_id" id="fine_type_id" value="{{ $fine_type_id }}">
                                                                                    <input type="hidden" name="order_detail_id" value="{{ $orderDetail->id }}"/>
                                                                                    <input type="hidden" name="order_id" value="{{ $orderDetail->order_id }}"/>
                                                                                    <input type="hidden" name="app_order_id" value="{{ $orderDetail->order->app_order_id }}"/>
                                                                                    <input type="hidden" name="app_detail_id" value="{{ $orderDetail->app_detail_id }}"/>
                                                                                </div>
                                                                                <button class="btn btn-success float-right ml-2 mt-2">  <i class="fa fa-dollar"> @lang('main.pay') </i></button>
                                                                            </form>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
