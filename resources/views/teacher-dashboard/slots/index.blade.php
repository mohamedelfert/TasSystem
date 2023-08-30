@extends('teacher-dashboard.layouts.app')
@section('title'){!! __('main.slots') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
    @include('teacher-dashboard.layouts.partials._breadcrumb',['level'=>'slots'])
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
                                            <li><a href="#tab1" class="nav-link active" data-toggle="tab">{!! __('main.teacher_info') !!}</a></li>
                                            <li><a href="#tab2" class="nav-link" data-toggle="tab">{!! __('main.slot_info') !!}</a></li>
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
                                                                <div class="media col-6 col-md-6 col-lg-6">
                                                                    <div class="media-body">
                                                                        <div class="mb-2 col-12 col-md-12 col-lg-12">
                                                                            <label>{!! __('main.place_type') !!}</label> : <span class="tx-medium badge badge-pill badge-warning">
                                                                                {{ auth()->user()->place_type ?? __('main.no_data_found') }}
                                                                            </span>
                                                                        </div>
                                                                        <div class="mb-2 col-12 col-md-12 col-lg-12">
                                                                            <label>{!! __('main.language') !!}</label> : <span class="tx-medium badge badge-pill badge-success">
                                                                                {{ auth()->user()->language ?? __('main.no_data_found') }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="media col-6 col-md-6 col-lg-6">
                                                                <div class="media-body">
                                                                    <div class="mb-2 col-12 col-md-12 col-lg-12">
                                                                        <label>{!! __('main.subjects') !!}</label> :
                                                                            @foreach($subjectsTeacher as $subjectTeacher)
                                                                                @if($subjectsTeacher->count() > 0)
                                                                                    <span class="tx-medium badge badge-pill badge-light-danger">
                                                                                        {{ $subjectTeacher->name }}
                                                                                    </span>
                                                                                @else
                                                                                    {{ __('main.no_data_found') }}
                                                                                @endif
                                                                            @endforeach
                                                                    </div>
                                                                    <div class="mb-2 col-12 col-md-12 col-lg-12">
                                                                        <label>{!! __('main.branches') !!}</label> :
                                                                            @foreach($branchesTeacher as $branchTeacher)
                                                                                <span class="tx-medium badge badge-pill badge-primary">
                                                                                    {{ $branchTeacher->name ?? __('main.no_data_found') }}
                                                                                </span>
                                                                            @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="media mt-3">
                                                    <div class="media-body">
                                                        <div class="col-12 mb-3">
                                                            @if(auth()->user()->place_type === null && auth()->user()->language === null)
                                                                <a href="{{ route('teacher.slots.create') }}"
                                                                   class="btn btn-primary float-right ml-1" title="@lang('main.create')">
                                                                    <i class="fa fa-plus"> @lang('main.create') </i>
                                                                </a>
                                                            @endif

                                                            @if(auth()->user()->place_type !== null && auth()->user()->language !== null)
                                                                <a href="{{ route('teacher.slots.edit',auth()->user()->id) }}"
                                                                   class="btn btn-success float-right" title="@lang('main.edit')">
                                                                    <i class="fa fa-edit"> @lang('main.edit') </i>
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tab2">
                                            <div class="main-contact-info-body p-4">
                                                <div class="row">
                                                    <div class="col-12 col-md-12 col-lg-12 order-2 order-md-2">
                                                        <div class="media-list pb-0">
                                                            <h4 class="text-primary">{{ __('main.slot_info') }}</h4>
                                                            <div class="media">
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
                                                                        @foreach ($slots as $slot)
                                                                            <tr>
                                                                                <th class="wd-10p border-bottom-0">
                                                                                    {{  Carbon\Carbon::parse($slot->start_at)->timezone(auth()->user()->timezone)->format('g:i A') .' - '. Carbon\Carbon::parse($slot->end_at)->timezone(auth()->user()->timezone)->format('g:i A') }}
                                                                                </th>
                                                                                @foreach ($workdays as $workday)
                                                                                    @php
                                                                                        $count = \App\Models\SlotTeacher::where('teacher_id',auth()->guard('teacher')->id())->where('slot_id',$slot->id)->where('workday_id',$workday->id)->count()
                                                                                    @endphp
                                                                                    <td>@if($count > 0) <span class="text-danger">checked</span> @else <span class="text-dark">-</span> @endif</td>
                                                                                @endforeach
                                                                            </tr>
                                                                        @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>

                                                            <div class="media mb-0">
                                                                <div class="media-body">
                                                                    <div class="col-12 mb-3">
                                                                        @php
                                                                            $teacherSlots = \App\Models\SlotTeacher::where('teacher_id',auth()->guard('teacher')->id())->count();
                                                                        @endphp

                                                                        <span class="btn btn-outline-linkedin float-left ml-1">
                                                                            @lang('main.total_slots') : {{ $teacherSlots }}
                                                                        </span>

                                                                        @if(auth()->user()->status === 'inactive')
                                                                            <a href="{{ route('teacher.createSlot') }}"
                                                                               class="btn btn-primary float-right ml-1" title="@lang('main.create')">
                                                                                <i class="fa fa-plus"> @lang('main.create') </i>
                                                                            </a>
                                                                        @endif

                                                                        @if(auth()->user()->status === 'active' && $teacherSlots < setting()->total)
                                                                            <a href="{{ route('teacher.createNewSlot') }}"
                                                                               class="btn btn-primary float-right ml-1" title="@lang('main.create')">
                                                                                <i class="fa fa-plus"> @lang('main.create') </i>
                                                                            </a>
                                                                        @endif

                                                                        @if(auth()->user()->status === 'active' && $teacherSlots >= setting()->total)
                                                                            <a href="{{ route('teacher.editSlot',auth()->user()->id) }}"
                                                                               class="btn btn-success float-right" title="@lang('main.edit')">
                                                                                <i class="fa fa-edit"> @lang('main.edit') </i>
                                                                            </a>
                                                                        @endif
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

