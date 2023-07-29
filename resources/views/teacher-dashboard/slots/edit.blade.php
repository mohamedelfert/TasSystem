@extends('teacher-dashboard.layouts.app')
@section('title')
    {!! __('main.slots') !!}
@endsection
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
                                    {!! __('main.slots') !!}
                                </div>
                                <hr>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="card-body">
                                        <div class="table-responsive">

                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            <form method="post" action="{{ route('teacher.slots.update',$teacher->id) }}">
                                                @csrf
                                                {{ method_field('PUT') }}

                                                <div class="row">
                                                    <div class="form-group py-1 col-md-3">
                                                        <label for="place_type"> {{__('main.online_and_center')}}</label>
                                                    </div>
                                                    <div class="form-group col-md-9">
                                                        <select name="place_type" id="place_type" class="form-control">
                                                            <option value="" disabled>{{__('main.select_place_type')}}</option>
                                                            <option value="online_center" {{($teacher->place_type === 'online_center') ? 'selected':''}}>
                                                                {{ __('main.online_and_center') }}
                                                            </option>
                                                            <option value="online" {{($teacher->place_type === 'online') ? 'selected':''}}>
                                                                {{ __('main.online') }}
                                                            </option>
                                                            <option value="center" {{($teacher->place_type === 'center') ? 'selected':''}}>
                                                                {{ __('main.center') }}
                                                            </option>
                                                        </select>
                                                        {{input_error($errors,'place_type')}}
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group py-1 col-md-3">
                                                        <label for="subjects"> {{__('main.subjects')}}</label>
                                                    </div>
                                                    <div class="form-group col-md-9">
                                                        {!! Form::select('subjects',App\Models\Subject::pluck('name','id'),request()->name ?? null,['class'=>'form-control col select2',
                                                            'multiple'=>'multiple','name'=>'subjects[]','id'=>'subjects',disable_on_show()]) !!}
                                                        {{input_error($errors,'subjects')}}
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label for="branches"> {{__('main.branches')}}</label>
                                                    </div>
                                                    <div class="form-group py-1 col-md-9">
                                                        {!! Form::select('branches',App\Models\Branch::pluck('name','id'),request()->name ?? null,['class'=>'form-control col select2',
                                                             'multiple'=>'multiple','name'=>'branches[]','id'=>'branches',disable_on_show()]) !!}
                                                        {{input_error($errors,'branches')}}
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label for="language"> {{__('main.language')}}</label>
                                                    </div>
                                                    <div class="form-group py-1 col-md-9">
                                                        <label
                                                            class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                            <input name="language" class="leading-tight" type="radio" value="arabic" {{ $teacher->language === 'arabic' ? 'checked':'' }}>
                                                            <span class="text-primary">@lang('main.fully_arabic')</span>
                                                        </label>
                                                        <label
                                                            class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                            <input name="language" class="leading-tight" type="radio" value="english" {{ $teacher->language === 'english' ? 'checked':'' }}>
                                                            <span class="text-primary">@lang('main.fully_english')</span>
                                                        </label>
                                                        <label
                                                            class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                            <input name="language" class="leading-tight" type="radio" value="both" {{ $teacher->language === 'both' ? 'checked':'' }}>
                                                            <span class="text-primary">@lang('main.both_english_arabic')</span>
                                                        </label>
                                                        {{input_error($errors,'language')}}
                                                    </div>
                                                </div>

                                                <hr>

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
                                                                                $count = \App\Models\SlotTeacher::where('teacher_id',auth()->guard('teacher')->id())->where('slot_id',$slot->id)->where('workday_id',$workday->id)->count();
                                                                            @endphp

                                                                            @if($count > 0)
                                                                                <input name="slots[{{ $slot->id }}][{{ $workday->id }}]" value="{{ $workday->id }}" class="leading-tight"
                                                                                       type="checkbox" checked="checked">
                                                                            @else
                                                                                <input name="slots[{{ $slot->id }}][{{ $workday->id }}]" value="{{ $workday->id }}" class="leading-tight"
                                                                                       type="checkbox">
                                                                            @endif
                                                                        </label>
                                                                    </th>
                                                                @endforeach
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                {{input_error($errors,'slots')}}

                                                <div class="modal-footer" style="margin-top: 10px">
                                                    @component('teacher-dashboard.layouts.partials.buttons._save_button',[])
                                                    @endcomponent
                                                </div>
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
@endsection

@section('footer')
    <script>
        $('#place_type').on( "change", function() {
            var place_type = $(this).val();
            if(place_type === 'online'){
                $('#branches').prop('disabled', true);
            }else {
                $('#branches').prop('disabled', false);
            }
        });
    </script>
@endsection
