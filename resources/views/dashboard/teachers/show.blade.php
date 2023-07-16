@extends('dashboard.layouts.app')
@section('title'){!! __('Show Teacher') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
    @include('dashboard.layouts.partials._breadcrumb',['level'=>'teachers'])
@endsection
@section('content')
{{--    <section id="column-selectors">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <h4 class="card-title">@yield('title')</h4>--}}
{{--                    </div>--}}
{{--                    <div class="card-content">--}}
{{--                        <div class="card-body card-dashboard">--}}
{{--                            {!! Form::model($teacher,['class'=>'form']  ) !!}--}}
{{--                            @csrf()--}}
{{--                            <div class="row">--}}
{{--                                @include('dashboard.teachers.partials._form')--}}
{{--                            </div>--}}
{{--                            {!! Form::close() !!}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}


    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab1" class="nav-link active" data-toggle="tab">{!! __('Teacher Information') !!}</a></li>
                                            <li><a href="#tab2" class="nav-link" data-toggle="tab">{!! __('Teacher Orders') !!}</a></li>
                                            <li><a href="#tab3" class="nav-link" data-toggle="tab">{!! __('Teacher Fines') !!}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                            <div class="main-contact-info-body p-4">
                                                <div class="row">
                                                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-1">
                                                        <p class="text-muted">
                                                            <img class="round"
                                                                 @if($teacher->image_path)
                                                                     src="{{ $teacher->image_path }}"
                                                                 @else
                                                                     src="{{asset('assets/dashboard/resources')}}/app-assets/images/portrait/small/avatar-s-11.jpg"
                                                                 @endif alt="{!! __('Teacher Image') !!}" style="width: 210px;height: 140px;">
                                                        </p>
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-2">
                                                        <div class="media-list pb-0">
                                                            <div class="media">
                                                                <div class="media-body">
                                                                    <div>
                                                                        <label>{!! __('Full Name') !!}</label> : <span class="tx-medium text-primary">{{ $teacher->first_name .' '. $teacher->last_name }}</span>
                                                                    </div>
                                                                    <div>
                                                                        <label>{!! __('Email') !!}</label> : <span class="tx-medium text-primary">{{ $teacher->email }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="media">
                                                                <div class="media-body">
                                                                    <div>
                                                                        <label>{!! __('Phone') !!}</label> : <span class="tx-medium text-danger">{{ $teacher->phone }}</span>
                                                                    </div>
                                                                    <div>
                                                                        <label>{!! __('Address') !!}</label> : <span class="tx-medium text-info">{{ $teacher->address }}</span>
                                                                    </div>
                                                                    <div>
                                                                        <label>{!! __('Status') !!}</label> :
                                                                        @if($teacher->status === 'active')
                                                                            <span class="badge badge-pill badge-success">{{ $teacher->status }}</span>
                                                                        @elseif($teacher->status === 'inactive')
                                                                            <span class="badge badge-pill badge-danger">{{ $teacher->status }}</span>
                                                                        @endif
                                                                    </div>
                                                                    <div>
                                                                        <label>{!! __('Work') !!}</label> :
                                                                        @if($teacher->work === 'yes')
                                                                            <span class="badge badge-pill badge-success">{{ $teacher->work }}</span>
                                                                        @elseif($teacher->work === 'no')
                                                                            <span class="badge badge-pill badge-danger">{{ $teacher->work }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="media mb-0">
                                                                <div class="media-body">
                                                                    <div>
                                                                        <label>{!! __('Country') !!}</label> : <span class="tx-medium text-dark">{{ optional($teacher->country)->name }}</span>
                                                                    </div>
                                                                    <div>
                                                                        <label>{!! __('Language') !!}</label> :
                                                                        @if($teacher->language === 1)
                                                                            <span class="badge badge-pill badge-success">{!! __('Arabic') !!}</span>
                                                                        @elseif($teacher->language === 2)
                                                                            <span class="badge badge-pill badge-primary">{!! __('English') !!}</span>
                                                                        @elseif($teacher->language === 3)
                                                                            <span class="badge badge-pill badge-secondary">{!! __('Both - [ Arabic , English ]') !!}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tab2">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table text-md-nowrap" id="example1">
                                                        <thead>
                                                            <tr>
                                                                <th class="wd-5p border-bottom-0">#</th>
                                                                <th class="wd-10p border-bottom-0">{!! __('Order Number') !!}</th>
                                                                <th class="wd-10p border-bottom-0">{!! __('Subject') !!}</th>
                                                                <th class="wd-10p border-bottom-0">{!! __('Date') !!}</th>
                                                                <th class="wd-10p border-bottom-0">{!! __('slot') !!}</th>
                                                                <th class="wd-10p border-bottom-0">{!! __('Branch') !!}</th>
                                                                <th class="wd-10p border-bottom-0">{!! __('Finish At') !!}</th>
                                                                <th class="wd-10p border-bottom-0">{!! __('Price') !!}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if($teacher->orders->count() > 0)
                                                                @foreach ($teacher->orders as $index => $order)
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

                                        <div class="tab-pane" id="tab3">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table text-md-nowrap" id="example1">
                                                        <thead>
                                                            <tr>
                                                                <th class="wd-5p border-bottom-0">#</th>
                                                                <th class="wd-10p border-bottom-0">{!! __('price') !!}</th>
                                                                <th class="wd-10p border-bottom-0">{!! __('Status') !!}</th>
                                                                <th class="wd-10p border-bottom-0">{!! __('Created At') !!}</th>
                                                                <th class="wd-10p border-bottom-0">{!! __('Payment At') !!}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if($teacher->fines->count() > 0)
                                                                @foreach ($teacher->fines as $index => $fine)
                                                                    <tr>
                                                                        <th class="wd-5p border-bottom-0">{{ $index + 1 }}</th>
                                                                        <th class="wd-10p border-bottom-0">{{ $fine->price }} $</th>
                                                                        <th class="wd-10p border-bottom-0">
                                                                            @if($fine->status === 'paid')
                                                                                <span class="badge badge-pill badge-success">{{ $fine->status }}</span>
                                                                            @elseif($fine->status === 'unpaid')
                                                                                <span class="badge badge-pill badge-primary">{{ $fine->status }}</span>
                                                                            @endif
                                                                        </th>
                                                                        <th class="wd-10p border-bottom-0">{{ $fine->created_at }}</th>
                                                                        <th class="wd-10p border-bottom-0"><span class="badge badge-pill badge-light-warning">{{ $fine->payment_date }}</span></th>
                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td colspan="5" class="text-center text-danger">{!! __('No Data Found') !!}</td>
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
        </div>
    </div>
@endsection
