@extends('teacher-dashboard.layouts.app')
@section('title'){!! __('Home') !!}@endsection
@section('header')
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/css/pages/dashboard-ecommerce.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/css/plugins/charts/chart-apex.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/app-assets/css/plugins/extensions/ext-component-toastr.min.css">@endsection

@section('content')
    <section id="column-selectors">
        <!-- Statistics Card -->
        <div class="col-xl-12 col-md-12 col-12">
            <div class="card card-statistics">
                <div class="card-header">
                    <h4 class="card-title">{{__('Statistics')}}</h4>
                </div>

                <div class="card-body statistics-body">
                    <div class="row">
                        <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-primary me-2">
                                    <div class="avatar-content">
                                        <i data-feather="trending-up" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">
                                        {{ \App\Models\Order::with('teacher')->where('teacher_id', auth()->user()->id)
                                            ->where('status','pending')->count() }}
                                    </h4>
                                    <p class="card-text font-small-3 mb-0">{{__('main.new_orders')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-primary me-2">
                                    <div class="avatar-content">
                                        <i data-feather="trending-up" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">
                                        {{ \App\Models\Order::with('teacher')->where('teacher_id', auth()->user()->id)->count() }}</h4>
                                    <p class="card-text font-small-3 mb-0">{{__('main.orders')}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                            <div class="d-flex flex-row">
                                <div class="avatar bg-light-primary me-2">
                                    <div class="avatar-content">
                                        <i data-feather="trending-up" class="avatar-icon"></i>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <h4 class="fw-bolder mb-0">
                                        {{ \App\Models\Fine::with('teacher')->where('teacher_id', auth()->user()->id)->count() }}
                                    </h4>
                                    <p class="card-text font-small-3 mb-0">{{__('main.fines')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Statistics Card -->
    </section>

@endsection
