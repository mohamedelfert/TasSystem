@extends('dashboard.layouts.app')
@section('title'){!! __('main.show_teacher') !!}@endsection
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
                                            <li><a href="#tab1" class="nav-link active" data-toggle="tab">{!! __('main.teacher_info') !!}</a></li>
                                            <li><a href="#tab2" class="nav-link" data-toggle="tab">{!! __('main.teacher_orders') !!}</a></li>
                                            <li><a href="#tab3" class="nav-link" data-toggle="tab">{!! __('main.teacher_fines') !!}</a></li>
                                            <li><a href="#tab4" class="nav-link" data-toggle="tab">{!! __('main.slot_info') !!}</a></li>
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
                                                                 @endif alt="{!! __('main.image') !!}" style="width: 210px;height: 140px;">
                                                        </p>
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-2">
                                                        <div class="media-list pb-0">
                                                            <div class="media">
                                                                <div class="media-body">
                                                                    <div>
                                                                        <label>{!! __('main.full_name') !!}</label> : <span class="tx-medium text-primary">{{ $teacher->first_name .' '. $teacher->last_name }}</span>
                                                                    </div>
                                                                    <div>
                                                                        <label>{!! __('main.email') !!}</label> : <span class="tx-medium text-primary">{{ $teacher->email }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="media">
                                                                <div class="media-body">
                                                                    <div>
                                                                        <label>{!! __('main.phone') !!}</label> : <span class="tx-medium text-danger">{{ $teacher->phone }}</span>
                                                                    </div>
                                                                    <div>
                                                                        <label>{!! __('main.address') !!}</label> : <span class="tx-medium text-info">{{ $teacher->address }}</span>
                                                                    </div>
                                                                    <div>
                                                                        <label>{!! __('main.status') !!}</label> :
                                                                        @if($teacher->status === 'active')
                                                                            <span class="badge badge-pill badge-success">{{ $teacher->status }}</span>
                                                                        @elseif($teacher->status === 'inactive')
                                                                            <span class="badge badge-pill badge-danger">{{ $teacher->status }}</span>
                                                                        @endif
                                                                    </div>
                                                                    <div>
                                                                        <label>{!! __('main.work') !!}</label> :
                                                                        @if($teacher->work === 'yes')
                                                                            <span class="badge badge-pill badge-success">{{ $teacher->work }}</span>
                                                                        @elseif($teacher->work === 'no')
                                                                            <span class="badge badge-pill badge-danger">{{ $teacher->work }}</span>
                                                                        @endif
                                                                    </div>
                                                                    <div>
                                                                        <label>{!! __('main.place_type') !!}</label> : <span class="tx-medium text-dark">{{ $teacher->place_type }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="media mb-0">
                                                                <div class="media-body">
                                                                    <div>
                                                                        <label>{!! __('main.country') !!}</label> : <span class="tx-medium text-dark">{{ optional($teacher->country)->name }}</span>
                                                                    </div>
                                                                    <div>
                                                                        <label>{!! __('main.language') !!}</label> :
                                                                        @if($teacher->language === 'arabic')
                                                                            <span class="badge badge-pill badge-success">{!! __('main.arabic') !!}</span>
                                                                        @elseif($teacher->language === 'english')
                                                                            <span class="badge badge-pill badge-primary">{!! __('main.english') !!}</span>
                                                                        @elseif($teacher->language === 'both')
                                                                            <span class="badge badge-pill badge-secondary">{!! __('main.both_english_arabic') !!}</span>
                                                                        @endif
                                                                    </div>
                                                                    <div>
                                                                        <label>{!! __('main.timezone') !!}</label> : <span class="tx-medium text-dark">{{ $teacher->timezone }}</span>
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
                                                                <th class="wd-10p border-bottom-0">{!! __('main.order_number') !!}</th>
                                                                <th class="wd-10p border-bottom-0">{!! __('main.subject') !!}</th>
                                                                <th class="wd-10p border-bottom-0">{!! __('main.date') !!}</th>
                                                                <th class="wd-10p border-bottom-0">{!! __('main.slot') !!}</th>
                                                                <th class="wd-10p border-bottom-0">{!! __('main.branch') !!}</th>
                                                                <th class="wd-10p border-bottom-0">{!! __('main.finished_at') !!}</th>
                                                                <th class="wd-10p border-bottom-0">{!! __('main.price') !!}</th>
                                                                <th class="wd-10p border-bottom-0">{!! __('main.status') !!}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if($teacher->orders->count() > 0)
                                                                @foreach ($teacher->orders as $index => $order)
                                                                    <tr>
                                                                        <th class="wd-5p border-bottom-0">{{ $index + 1 }}</th>
                                                                        <th class="wd-10p border-bottom-0">{{ optional($order->orderDetails()->first())->order_id }}</th>
                                                                        <th class="wd-10p border-bottom-0">{{ optional($order->subject)->name }}</th>
                                                                        <th class="wd-10p border-bottom-0">
                                                                            <span class="badge badge-pill badge-primary">{{ $order->date }}</span>
                                                                        </th>
                                                                        <th class="wd-10p border-bottom-0">
                                                                            <span class="badge badge-pill badge-secondary">
                                                                            {{ Carbon\Carbon::parse(optional($order->slot)->start_at)->format('g:i A') .' - '. Carbon\Carbon::parse(optional($order->slot)->end_at)->format('g:i A') }}
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
                                                                                <span class="badge badge-pill badge-success">{{ $order->status }}</span>
                                                                            @elseif($order->status === 'cancelled')
                                                                                <span class="badge badge-pill badge-danger">{{ $order->status }}</span>
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

                                        <div class="tab-pane" id="tab3">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table text-md-nowrap" id="example1">
                                                        <thead>
                                                            <tr>
                                                                <th class="wd-5p border-bottom-0">#</th>
                                                                <th class="wd-10p border-bottom-0">{!! __('main.fine_type') !!}</th>
                                                                <th class="wd-10p border-bottom-0">{!! __('main.price') !!}</th>
                                                                <th class="wd-10p border-bottom-0">{!! __('main.status') !!}</th>
                                                                <th class="wd-10p border-bottom-0">{!! __('main.created_at') !!}</th>
                                                                <th class="wd-10p border-bottom-0">{!! __('main.payment_date') !!}</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if($teacher->fines->count() > 0)
                                                                @foreach ($teacher->fines as $index => $fine)
                                                                    <tr>
                                                                        <th class="wd-5p border-bottom-0">{{ $index + 1 }}</th>
                                                                        <th>
                                                                            @if($fine->fine_type_id === 1)
                                                                                <span class="badge badge-pill badge-light-danger">
                                                                                {{ optional($fine->fineType)->getTranslation('name','en') }}
                                                                            </span>
                                                                            @elseif($fine->fine_type_id === 2)
                                                                                <span class="badge badge-pill badge-light-warning">
                                                                                {{ optional($fine->fineType)->getTranslation('name','en') }}
                                                                            </span>
                                                                            @else
                                                                                <span class="badge badge-pill badge-light-success">
                                                                                {{ optional($fine->fineType)->getTranslation('name','en') }}
                                                                            </span>
                                                                            @endif
                                                                        </th>
                                                                        <th class="wd-10p border-bottom-0">{{ $fine->price }} $</th>
                                                                        <th class="wd-10p border-bottom-0">
                                                                            @if($fine->status === 'paid')
                                                                                <a href="{{ route('admin.paid',$fine->id) }}">
                                                                                    <span class="badge badge-pill badge-success">{{ $fine->status }}</span>
                                                                                </a>
                                                                            @elseif($fine->status === 'unpaid')
                                                                                <a href="{{ route('admin.unpaid',$fine->id) }}">
                                                                                    <span class="badge badge-pill badge-danger">{{ $fine->status }}</span>
                                                                                </a>
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
                                                                        <td colspan="5" class="text-center text-danger">{!! __('main.no_data_found') !!}</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tab4">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table text-md-nowrap" id="example1">
                                                        <thead>
                                                        <tr>
                                                            <th class="wd-10p border-bottom-0">{!! __('main.slots') !!}</th>
                                                            <th class="wd-10p border-bottom-0">{!! __('main.saturday') !!}</th>
                                                            <th class="wd-10p border-bottom-0">{!! __('main.sunday') !!}</th>
                                                            <th class="wd-10p border-bottom-0">{!! __('main.monday') !!}</th>
                                                            <th class="wd-10p border-bottom-0">{!! __('main.tuesday') !!}</th>
                                                            <th class="wd-10p border-bottom-0">{!! __('main.wednesday') !!}</th>
                                                            <th class="wd-10p border-bottom-0">{!! __('main.thursday') !!}</th>
                                                            <th class="wd-10p border-bottom-0">{!! __('main.friday') !!}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach (\App\Models\Slot::all() as $slot)
                                                            <tr>
                                                                <th class="wd-10p border-bottom-0">
                                                                    {{  Carbon\Carbon::parse($slot->start_at)->timezone(auth()->user()->timezone)->format('g:i A') .' - '. Carbon\Carbon::parse($slot->end_at)->timezone(auth()->user()->timezone)->format('g:i A') }}
                                                                </th>
                                                                @foreach (\App\Models\Workday::all() as $workday)
                                                                    {{--                                                                            <th class="wd-10p border-bottom-0">--}}
                                                                    {{--                                                                                <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">--}}
                                                                    {{--                                                                                    @php--}}
                                                                    {{--                                                                                        $count = \App\Models\SlotTeacher::where('teacher_id',$teacher->id)->where('slot_id',$slot->id)->where('workday_id',$workday->id)->count()--}}
                                                                    {{--                                                                                    @endphp--}}
                                                                    {{--                                                                                    <input name="slots[{{ $slot->id }}][{{ $workday->id }}]" value="{{ $workday->id }}" class="leading-tight checkbox"--}}
                                                                    {{--                                                                                           type="checkbox"  @if($count > 0) checked style="accent-color: red !important;" @endif>--}}
                                                                    {{--                                                                                </label>--}}
                                                                    {{--                                                                            </th>--}}

                                                                    @php
                                                                        $count = \App\Models\SlotTeacher::where('teacher_id',$teacher->id)->where('slot_id',$slot->id)->where('workday_id',$workday->id)->count()
                                                                    @endphp
                                                                    <td>@if($count > 0) <span class="text-danger">checked</span> @else <span class="text-dark">-</span> @endif</td>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
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
