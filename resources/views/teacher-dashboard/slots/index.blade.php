{{--@extends('teacher-dashboard.layouts.app')--}}
{{--@section('title')--}}
{{--    {!! __('main.slots') !!}--}}
{{--@endsection--}}
{{--@section('header')@endsection--}}
{{--@section('breadcrumb')--}}
{{--    @include('teacher-dashboard.layouts.partials._breadcrumb',['level'=>'slots'])--}}
{{--@endsection--}}
{{--@section('content')--}}
{{--    <div class="row row-sm">--}}
{{--        <div class="col-xl-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="text-wrap">--}}
{{--                        <div class="example">--}}
{{--                            <div class="panel panel-primary tabs-style-2">--}}
{{--                                <div class=" tab-menu-heading">--}}
{{--                                    {!! __('main.slots') !!}--}}
{{--                                </div>--}}
{{--                                <hr>--}}
{{--                                <div class="panel-body tabs-menu-body main-content-body-right border">--}}
{{--                                    <div class="card-body">--}}
{{--                                        <div class="table-responsive">--}}
{{--                                            <form method="post" action="{{ route('teacher.slots.store') }}">--}}
{{--                                                @csrf--}}

{{--                                                <div class="row">--}}
{{--                                                    <div class="form-group py-1 col-md-3">--}}
{{--                                                        <label for="place_type"> {{__('main.online_and_center')}}</label>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group col-md-9">--}}
{{--                                                        {!! Form::select('place_type',['online_center'=>__('main.online_and_center'),'online'=>__('main.online'),'center'=>__('main.center')]--}}
{{--                                                            ,null,['class'=>'form-control mb-2','id'=>'place_type',disable_on_show()]) !!}--}}
{{--                                                        {{input_error($errors,'place_type')}}--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="row">--}}
{{--                                                    <div class="form-group py-1 col-md-3">--}}
{{--                                                        <label for="subjects"> {{__('main.subjects')}}</label>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group col-md-9">--}}
{{--                                                        {!! Form::select('subjects',App\Models\Subject::pluck('name','id'),request()->name ?? null,['class'=>'form-control col select2',--}}
{{--                                                            'multiple'=>'multiple','name'=>'subjects[]','id'=>'subjects',disable_on_show()]) !!}--}}
{{--                                                        {{input_error($errors,'subjects')}}--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="row">--}}
{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="branches"> {{__('main.branches')}}</label>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group py-1 col-md-9">--}}
{{--                                                        {!! Form::select('branches',App\Models\Branch::pluck('name','id'),request()->name ?? null,['class'=>'form-control col select2',--}}
{{--                                                             'multiple'=>'multiple','name'=>'branches[]','id'=>'branches',disable_on_show()]) !!}--}}
{{--                                                        {{input_error($errors,'branches')}}--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div class="row">--}}
{{--                                                    <div class="form-group col-md-3">--}}
{{--                                                        <label for="language"> {{__('main.language')}}</label>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group py-1 col-md-9">--}}
{{--                                                        <label--}}
{{--                                                            class="block text-gray-500 font-semibold sm:border-r sm:pr-4">--}}
{{--                                                            <input name="language" class="leading-tight" type="radio" value="arabic">--}}
{{--                                                            <span class="text-primary">@lang('main.fully_arabic')</span>--}}
{{--                                                        </label>--}}
{{--                                                        <label--}}
{{--                                                            class="block text-gray-500 font-semibold sm:border-r sm:pr-4">--}}
{{--                                                            <input name="language" class="leading-tight" type="radio" value="english">--}}
{{--                                                            <span class="text-primary">@lang('main.fully_english')</span>--}}
{{--                                                        </label>--}}
{{--                                                        <label--}}
{{--                                                            class="block text-gray-500 font-semibold sm:border-r sm:pr-4">--}}
{{--                                                            <input name="language" class="leading-tight" type="radio" value="both">--}}
{{--                                                            <span class="text-primary">@lang('main.both_english_arabic')</span>--}}
{{--                                                        </label>--}}
{{--                                                        {{input_error($errors,'language')}}--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <hr>--}}

{{--                                                <table class="table text-md-nowrap" id="example1">--}}
{{--                                                    <thead>--}}
{{--                                                    <tr>--}}
{{--                                                        <th class="wd-10p border-bottom-0">{!! __('main.slots') !!}</th>--}}
{{--                                                        <th class="wd-10p border-bottom-0">{!! __('main.saturday') !!}</th>--}}
{{--                                                        <th class="wd-10p border-bottom-0">{!! __('main.sunday') !!}</th>--}}
{{--                                                        <th class="wd-10p border-bottom-0">{!! __('main.monday') !!}</th>--}}
{{--                                                        <th class="wd-10p border-bottom-0">{!! __('main.tuesday') !!}</th>--}}
{{--                                                        <th class="wd-10p border-bottom-0">{!! __('main.wednesday') !!}</th>--}}
{{--                                                        <th class="wd-10p border-bottom-0">{!! __('main.thursday') !!}</th>--}}
{{--                                                        <th class="wd-10p border-bottom-0">{!! __('main.friday') !!}</th>--}}
{{--                                                    </tr>--}}
{{--                                                    </thead>--}}
{{--                                                    <tbody>--}}
{{--                                                    @foreach ($slots as $slot)--}}
{{--                                                        <tr>--}}
{{--                                                            <th class="wd-10p border-bottom-0">--}}
{{--                                                                {{  Carbon\Carbon::parse($slot->start_at)->format('g:i A') .' - '. Carbon\Carbon::parse($slot->end_at)->format('g:i A') }}--}}
{{--                                                            </th>--}}
{{--                                                            @foreach ($workdays as $workday)--}}
{{--                                                                <th class="wd-10p border-bottom-0">--}}
{{--                                                                    <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">--}}
{{--                                                                        <input name="slots[{{ $slot->id }}][{{ $workday->id }}]"--}}
{{--                                                                               value="{{ $workday->id }}" class="leading-tight" type="checkbox">--}}
{{--                                                                    </label>--}}
{{--                                                                </th>--}}
{{--                                                            @endforeach--}}
{{--                                                        </tr>--}}
{{--                                                    @endforeach--}}
{{--                                                    </tbody>--}}
{{--                                                </table>--}}
{{--                                                {{input_error($errors,'slots')}}--}}

{{--                                                <div class="modal-footer" style="margin-top: 10px">--}}
{{--                                                    @component('teacher-dashboard.layouts.partials.buttons._save_button',[])--}}
{{--                                                    @endcomponent--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

{{--@section('footer')--}}
{{--    <script>--}}
{{--        $('#place_type').on( "change", function() {--}}
{{--            var place_type = $(this).val();--}}
{{--            if(place_type === 'online'){--}}
{{--                $('#branches').prop('disabled', true);--}}
{{--            }else {--}}
{{--                $('#branches').prop('disabled', false);--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}



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
                                            <li><a href="#tab1" class="nav-link active" data-toggle="tab">{!! __('main.slot_info') !!}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                            <div class="main-contact-info-body p-4">
                                                <div class="row">
                                                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-1">
                                                        <div class="media-list pb-0">
                                                            <div class="media">
                                                                <div class="media-body">
                                                                    <div>
                                                                        <label>{!! __('main.place_type') !!}</label> : <span class="tx-medium text-primary">
                                                                            {{ auth()->user()->place_type ?? __('main.no_data_found') }}
                                                                        </span>
                                                                    </div>
                                                                    <div>
                                                                        <label>{!! __('main.language') !!}</label> : <span class="tx-medium text-primary">
                                                                            {{ auth()->user()->language ?? __('main.no_data_found') }}
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="media">
                                                                <div class="media-body">
                                                                    <div>
                                                                        <label>{!! __('main.subjects') !!}</label> : <span class="tx-medium text-danger">
                                                                            @foreach($subjectsTeacher as $subjectTeacher)
                                                                                {{ $subjectTeacher->name }}
                                                                            @endforeach
                                                                        </span>
                                                                    </div>
                                                                    <div>
                                                                        <label>{!! __('main.branches') !!}</label> : <span class="tx-medium text-primary">
                                                                            @foreach($branchesTeacher as $branchTeacher)
                                                                                {{ $branchTeacher->name }}
                                                                            @endforeach
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-2">
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
                                                                                        {{  Carbon\Carbon::parse($slot->start_at)->format('g:i A') .' - '. Carbon\Carbon::parse($slot->end_at)->format('g:i A') }}
                                                                                    </th>
                                                                                    @foreach ($workdays as $workday)
                                                                                        <th class="wd-10p border-bottom-0">
                                                                                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                                                                @php
                                                                                                    $count = \App\Models\SlotTeacher::where('teacher_id',auth()->guard('teacher')->id())->where('slot_id',$slot->id)->where('workday_id',$workday->id)->count()
                                                                                                @endphp
                                                                                                <input name="slots[{{ $slot->id }}][{{ $workday->id }}]" value="{{ $workday->id }}" class="leading-tight"
                                                                                                       type="checkbox" disabled @if($count > 0) checked @endif>
                                                                                            </label>
                                                                                        </th>
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
                                                                        @if(auth()->user()->status === 'inactive')
                                                                            <a href="{{ route('teacher.slots.create') }}"
                                                                               class="btn btn-primary float-right ml-1" title="@lang('main.create')">
                                                                                <i class="fa fa-plus"> @lang('main.create') </i>
                                                                            </a>
                                                                        @else
                                                                            <a href="#"
                                                                               class="btn btn-primary float-right ml-1 disabled" title="@lang('main.create')">
                                                                                <i class="fa fa-plus"> @lang('main.create') </i>
                                                                            </a>
                                                                        @endif

                                                                        @if(auth()->user()->status === 'active')
                                                                            <a href="{{ route('teacher.slots.edit',auth()->user()->id) }}"
                                                                               class="btn btn-success float-right" title="@lang('main.edit')">
                                                                                <i class="fa fa-edit"> @lang('main.edit') </i>
                                                                            </a>
                                                                        @else
                                                                            <a href="#"
                                                                               class="btn btn-success float-right disabled" title="@lang('main.edit')">
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

