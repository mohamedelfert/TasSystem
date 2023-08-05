@extends('teacher-dashboard.layouts.app')
@section('title'){!! __('main.home') !!}@endsection
@section('header')
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/css/pages/dashboard-ecommerce.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/css/plugins/charts/chart-apex.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/css/plugins/extensions/ext-component-toastr.min.css">
@endsection
@section('content')
    <section id="column-selectors">
        <div class="col-xl-12 col-md-12 col-12">
            <div class="card card-statistics">
                <div class="card-header">
                    <h4 class="card-title">{{__('main.statistics')}}</h4>
                </div>

                <div class="card-body statistics-body">
                    <div class="row">
                        <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                            <div class="card card-statistics h-100">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <span class="text-danger">
                                                <i class="fa fa-pie-chart highlight-icon fa-3x" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                        <div class="float-right text-right">
                                            <p class="card-text text-dark">{{__('main.new_orders')}}</p>
                                            <h4>
                                                {{ \App\Models\Order::with('teacher')->where('teacher_id', auth()->user()->id)
                                                ->where('status','pending')->count() }}
                                            </h4>
                                        </div>
                                    </div>
                                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                        <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>
                                        <a href="{{ route('teacher.newOrders') }}">{{__('main.show')}}</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                            <div class="card card-statistics h-100">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <span class="text-primary">
                                                <i class="fa fa-shopping-bag highlight-icon fa-3x" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                        <div class="float-right text-right">
                                            <p class="card-text text-dark">{{__('main.orders')}}</p>
                                            <h4>
                                                {{ \App\Models\Order::with('teacher')->where('teacher_id', auth()->user()->id)->count() }}
                                            </h4>
                                        </div>
                                    </div>
                                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                        <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>
                                        <a href="{{ route('teacher.orders.index') }}">{{__('main.show')}}</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                            <div class="card card-statistics h-100">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <span class="text-dark">
                                                <i class="fa fa-dollar highlight-icon fa-3x" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                        <div class="float-right text-right">
                                            <p class="card-text text-dark">{{__('main.fines')}}</p>
                                            <h4>
                                                {{ \App\Models\Fine::with('teacher')->where('teacher_id', auth()->user()->id)->count() }}
                                            </h4>
                                        </div>
                                    </div>
                                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                        <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>
                                        <a href="{{ route('teacher.fines.index') }}">{{__('main.show')}}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
