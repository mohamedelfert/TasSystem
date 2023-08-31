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
                                                                <option {{ old('old_workday_id') == $workday->id ? 'selected':'' }} value="{{ $workday->id }}">
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
                                                            @php $old_slot = \App\Models\Slot::where('id',old('old_slot_id'))->first(); @endphp
                                                            <option value="{{ old('old_slot_id') }}" @if(old('old_slot_id')) selected @endif>
                                                                {{ @$old_slot->start_at .' : '. @$old_slot->end_at }}
                                                            </option>
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
                                                                <option {{ old('workday_id') == $workday->id ? 'selected':'' }} value="{{ $workday->id }}">
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
                                                            @php $slot = \App\Models\Slot::where('id',old('slot_id'))->first(); @endphp
                                                            <option value="{{ old('slot_id') }}" @if(old('slot_id')) selected @endif>
                                                                {{ @$slot->start_at .' : '. @$slot->end_at }}
                                                            </option>
                                                        </select>
                                                        {{input_error($errors,'slot_id')}}
                                                    </div>
                                                </div>

                                                <div class="modal-footer" style="margin-top: 10px">
                                                    @php
                                                        $fineType = \App\Models\FineType::where('type','edit')->first();
                                                    @endphp
                                                    <input type="hidden" name="teacher_id" id="teacher_id" value="{{ $teacher->id }}">
                                                    <input type="hidden" name="fine_type_id" id="fine_type_id" value="{{ $fineType->id }}">
                                                    <input type="hidden" name="price" id="price" value="{{ $fineType->price }}">
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
                            $.each(data, function () {
                                for (let i = 0; i <= data.length; i++) {
                                    $('select[name="old_slot_id"]').append(`<option value="${data[i].slot_id}">${data[i].start_at} - ${data[i].end_at}</option>`);
                                }
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
                            // $.each(data, function (key, value) {
                            //     $('select[name="slot_id"]').append(`<option value="${key}">${value}</option>`);
                            // });
                            $.each(data, function () {
                                for (let i = 0; i <= data.length; i++) {
                                    $('select[name="slot_id"]').append(`<option value="${data[i].id}">${data[i].start_at} - ${data[i].end_at}</option>`);
                                }
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
