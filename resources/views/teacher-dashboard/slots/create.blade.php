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

                                            <form method="post" action="{{ route('teacher.slots.store') }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group py-1 col-md-3">
                                                        <label for="place_type"> {{__('main.online_and_center')}}</label>
                                                    </div>
                                                    <div class="form-group col-md-9">
                                                        {!! Form::select('place_type',['online_center'=>__('main.online_and_center'),'online'=>__('main.online'),'center'=>__('main.center')]
                                                            ,request()->place_type ?? old('place_type'),['class'=>'form-control mb-2','id'=>'place_type',disable_on_show()]) !!}
                                                        {{input_error($errors,'place_type')}}
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group py-1 col-md-3">
                                                        <label for="subjects"> {{__('main.subjects')}}</label>
                                                    </div>
                                                    <div class="form-group col-md-9">
                                                        {!! Form::select('subjects',App\Models\Subject::pluck('name','id'),request()->name ?? old('subjects'),['class'=>'form-control col select2',
                                                            'multiple'=>'multiple','name'=>'subjects[]','id'=>'subjects',disable_on_show()]) !!}
                                                        {{input_error($errors,'subjects')}}
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label for="branches"> {{__('main.branches')}}</label>
                                                    </div>
                                                    <div class="form-group py-1 col-md-9">
                                                        {!! Form::select('branches',App\Models\Branch::pluck('name','id'),request()->name ?? old('branches'),['class'=>'form-control col select2',
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
                                                            <input name="language" class="leading-tight" type="radio" value="arabic" {{ old("language") == 'arabic' ? 'checked' : '' }}>
                                                            <span class="text-primary">@lang('main.fully_arabic')</span>
                                                        </label>
                                                        <label
                                                            class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                            <input name="language" class="leading-tight" type="radio" value="english" {{ old("language") == 'english' ? 'checked' : '' }}>
                                                            <span class="text-primary">@lang('main.fully_english')</span>
                                                        </label>
                                                        <label
                                                            class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                                            <input name="language" class="leading-tight" type="radio" value="both" {{ old("language") == 'both' ? 'checked' : '' }}>
                                                            <span class="text-primary">@lang('main.both_english_arabic')</span>
                                                        </label>
                                                        {{input_error($errors,'language')}}
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
