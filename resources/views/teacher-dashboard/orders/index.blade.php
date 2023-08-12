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
                                <div class="card-header pb-0">
                                    <div class="box-header with-border mb-2">
                                        <form action="{{ route('teacher.dateSearch') }}" method="POST" class="d-inline-block">
                                            {{ csrf_field() }}
                                            <div class="d-inline-block">
                                                <label for="from_date">{!! __('main.from_date') !!}</label>
                                                <input type="date" class="form-control col" value="{{$from_date ?? ''}}" name="from_date" id="from_date">
                                            </div>

                                            <div class="d-inline-block">
                                                <label for="to_date">{!! __('main.to_date') !!}</label>
                                                <input type="date" class="form-control col" value="{{$to_date ?? ''}}" name="to_date" id="to_date">
                                            </div>

                                            <div class="d-inline-block">
                                                <button class="btn btn-dark btn-sm" title="@lang('main.search')">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                                <a class="btn btn-danger btn-sm" href="{{ route('teacher.orders.index') }}"
                                                   title="@lang('main.clear')">
                                                    <i class="fa fa-eraser"></i>
                                                </a>
                                            </div>
                                        </form>
                                    </div>

                                    <!-- This Form For Filter -->
                                    <div class="mb-2">
                                        <form action="{{ route('teacher.filterStatus') }}" method="POST" class="d-inline-block">
                                            {{ csrf_field() }}
                                            <label for="status">{!! __('main.search_by_status') !!}
                                                <select class="custom-select mr-sm-2" name="status" data-style="btn-info" onchange="this.form.submit()">
                                                    <option value="" selected disabled>{!! __('main.search_by_status') !!}</option>
                                                    <option value="accepted">{!! __('main.accepted') !!}</option>
                                                    <option value="cancelled">{!! __('main.cancelled') !!}</option>
                                                    <option value="completed">{!! __('main.completed') !!}</option>
                                                </select>
                                            </label>
                                        </form>

                                        <form action="{{ route('teacher.filterSubject') }}" method="POST" class="d-inline-block">
                                            {{ csrf_field() }}
                                            <label for="subject_id">{!! __('main.search_by_subject') !!}
                                                <select class="custom-select mr-sm-2" name="subject_id" data-style="btn-info" onchange="this.form.submit()">
                                                    <option value="" selected disabled>{!! __('main.search_by_subject') !!}</option>
                                                    @foreach($subjects as $subject)
                                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </form>
                                    </div>
                                    <!-- This Form For Filter -->

                                </div>

                                <hr style="margin:10px 30px">

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
                                                        <th class="wd-10p border-bottom-0">{!! __('main.branch') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('main.finished_at') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('main.price') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('main.final_price') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('main.status') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('main.options') !!}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($orders->count() > 0)
                                                        @foreach ($orders as $index => $order)
                                                            <tr>
                                                                <th class="wd-5p border-bottom-0">{{ $index + 1 }}</th>
                                                                <th class="wd-10p border-bottom-0">{{ optional($order->orderDetails()->first())->order_id }}</th>
                                                                <th class="wd-10p border-bottom-0">{{ optional($order->subject)->name }}</th>
                                                                <th class="wd-10p border-bottom-0">
                                                                    <span class="badge badge-pill badge-primary">{{ $order->date }}</span>
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
                                                                    @endif
                                                                </th>
                                                                <th class="wd-10p border-bottom-0">
                                                                    <a href="{{ route('teacher.orderDetails',$order->id) }}">
                                                                        <span class="btn btn-success btn-sm">{!! __('main.details') !!}</span>
                                                                    </a>
                                                                </th>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                                                            <tbody>
                                                            <tr>
                                                                <td colspan="10" class="text-center text-danger">{!! __('main.no_data_found') !!}</td>
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
