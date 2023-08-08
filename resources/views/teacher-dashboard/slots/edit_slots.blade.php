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

                                            <form method="post" action="{{ route('teacher.doEditSlot',$teacher->id) }}">
                                                @csrf
                                                {{ method_field('PUT') }}
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
                                                                    <th class="wd-10p border-bottom-0">
                                                                        <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                                            @php
                                                                                $count = \App\Models\SlotTeacher::where('teacher_id',auth()->guard('teacher')->id())->where('slot_id',$slot->id)->where('workday_id',$workday->id)->count();
                                                                            @endphp
                                                                            <input name="slots[{{ $slot->id }}][{{ $workday->id }}]" value="{{ $workday->id }}" class="leading-tight"
                                                                                   type="checkbox" @checked($count > 0)>
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
