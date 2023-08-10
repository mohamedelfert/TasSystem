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

                                                <div class="row">
                                                    <div class="form-group py-1 col-md-3">
                                                        <label for="old_workday_id"> {{__('main.old_workdays')}}</label>
                                                    </div>
                                                    <div class="form-group col-md-9">
                                                        <select name="old_workday_id" id="old_workday_id" class="form-control col">
                                                            <option value="">{{ __('main.select_workday') }}</option>
                                                            @foreach($workdays as $workday)
                                                                <option value="{{ $workday->id }}">
                                                                    {{ $workday->day }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        {{input_error($errors,'old_workday_id')}}
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group py-1 col-md-3">
                                                        <label for="old_slot_id"> {{__('main.old_slots')}}</label>
                                                    </div>
                                                    <div class="form-group col-md-9">
                                                        <select name="old_slot_id" id="old_slot_id" class="form-control col">
                                                            {{--                                                            @foreach($slotsTeacher as $slotTeacher)--}}
                                                            {{--                                                                <option value="{{ $slotTeacher->id }}">--}}
                                                            {{--                                                                    {{ Carbon\Carbon::parse($slotTeacher->slot->start_at)->timezone(auth()->user()->timezone)->format('g:i A') .' - '. Carbon\Carbon::parse($slotTeacher->slot->end_at)->timezone(auth()->user()->timezone)->format('g:i A') }}--}}
                                                            {{--                                                                </option>--}}
                                                            {{--                                                            @endforeach--}}
                                                        </select>
                                                        {{input_error($errors,'old_slot_id')}}
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group py-1 col-md-3">
                                                        <label for="workday_id"> {{__('main.new_workday')}}</label>
                                                    </div>
                                                    <div class="form-group col-md-9">
                                                        <select name="workday_id" id="workday_id"
                                                                class="form-control col">
                                                            <option value="">{{ __('main.select_workday') }}</option>
                                                            @foreach($workdays as $workday)
                                                                <option value="{{ $workday->id }}">
                                                                    {{ $workday->day }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        {{input_error($errors,'workday_id')}}
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group py-1 col-md-3">
                                                        <label for="slot_id"> {{__('main.new_slot')}}</label>
                                                    </div>
                                                    <div class="form-group col-md-9">
                                                        <select name="slot_id" id="slot_id" class="form-control col">
                                                            {{--                                                            @foreach($slots as $slot)--}}
                                                            {{--                                                                <option value="{{ $slot->id }}">--}}
                                                            {{--                                                                    {{ Carbon\Carbon::parse($slot->start_at)->timezone(auth()->user()->timezone)->format('g:i A') .' - '. Carbon\Carbon::parse($slot->end_at)->timezone(auth()->user()->timezone)->format('g:i A') }}--}}
                                                            {{--                                                                </option>--}}
                                                            {{--                                                            @endforeach--}}
                                                        </select>
                                                        {{input_error($errors,'slot_id')}}
                                                    </div>
                                                </div>

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
        // this to get slots choose before
        $(document).ready(function () {
            $('select[name="old_workday_id"]').on('change', function () {
                let old_workday_id = $(this).val();
                if (old_workday_id) {
                    $.ajax({
                        url: "{{ route('teacher.getSlots') }}",
                        type: 'GET',
                        data: {id: old_workday_id},
                        dataType: 'JSON',
                        success: function (data) {
                            $('select[name="old_slot_id"]').empty()
                            $.each(data, function (key, value) {
                                $('select[name="old_slot_id"]').append(`<option value="${value}">${value}</option>`);
                            });
                        }
                    })
                } else {
                    console.log('Ajax Load Failed');
                }
            });
        });

        // this to new slots did not choose
        $(document).ready(function () {
            $('select[name="workday_id"]').on('change', function () {
                let workday_id = $(this).val();
                if (workday_id) {
                    $.ajax({
                        url: "{{ route('teacher.getNewSlots') }}",
                        type: 'GET',
                        data: {id: workday_id},
                        dataType: 'JSON',
                        success: function (data) {
                            $('select[name="slot_id"]').empty()
                            $.each(data, function (key, value) {
                                $('select[name="slot_id"]').append(`<option value="${key}">${value}</option>`);
                            });
                        }
                    })
                } else {
                    console.log('Ajax Load Failed');
                }
            });
        });
    </script>
@endsection
