@extends('dashboard.layouts.app')
@section('title'){!! __('main.create_slot_validation') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
    @include('dashboard.layouts.partials._breadcrumb',['level'=>'slots-validation'])
@endsection
@section('content')
    <section id="column-selectors">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@yield('title')</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {!! Form::open(['method'=>'post','route'=>'admin.doEditSlotValidation','class'=>'form','enctype' => 'multipart/form-data']) !!}
                            @csrf()
                                <div class="repeater">
                                    <div data-repeater-list="slots_list">
                                        <div class="row">
                                            <div class="form-group py-1 col-md-12">
                                                <label for="formInputRole"> {{__('main.total')}}</label>
                                                {!! Form::number('total',setting()->total,['class'=>'form-control col','min'=>'0','max'=>'50',
                                                    isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
                                                {{input_error($errors,'total')}}
                                            </div>
                                        </div>
                                        <div class="div_inputs" data-repeater-item>
{{--                                            <div class="row">--}}
{{--                                                <div class="form-group py-1 col-md-4">--}}
{{--                                                    <label for="formInputRole"> {{__('main.start')}}</label>--}}
{{--                                                    {!! Form::time('start[]',null,['class'=>'form-control col',--}}
{{--                                                        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}--}}
{{--                                                    {{input_error($errors,'start[]')}}--}}
{{--                                                </div>--}}

{{--                                                <div class="form-group py-1 col-md-4">--}}
{{--                                                    <label for="formInputRole"> {{__('main.end')}}</label>--}}
{{--                                                    {!! Form::time('end[]',null,['class'=>'form-control col',--}}
{{--                                                        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}--}}
{{--                                                    {{input_error($errors,'end[]')}}--}}
{{--                                                </div>--}}

{{--                                                <div class="form-group py-1 col-md-3">--}}
{{--                                                    <label for="number"> {{__('main.number')}}</label>--}}
{{--                                                    {!! Form::number('number[]',null,['id'=>'number','class'=>'form-control col','min'=>'0','max'=>'100','placeholder'=>__("main.number"),--}}
{{--                                                        isset($readOnly)?$readOnly:null,disable_on_show(),'required']) !!}--}}
{{--                                                    {{input_error($errors,'number[]')}}--}}
{{--                                                </div>--}}

{{--                                                <a href="#" class="btn btn-danger remove_input btn-sm mt-3 mb-3">--}}
{{--                                                    <i class="fa fa-trash"></i>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        @component('dashboard.layouts.partials.buttons._save_button',[])
                                        @endcomponent
                                        <div class="col-12">
                                            <input class="btn btn-success mr-1 mb-1 waves-effect waves-light add_input" data-repeater-create type="button" value="{{ __('main.add_new') }}"/>
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js-validation')
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
@endsection
@section('footer')
    <script type="text/javascript">
        var x = 1;
        $(document).on('click', '.add_input', function () {
            var max_inputs = 10;
            if (x < max_inputs) {
                $('.div_inputs').append(
                    `
                        <div class="row">
                            <div class="form-group py-1 col-md-4">
                            <label for="formInputRole"> {{__('main.start')}}</label>
                            {!! Form::time('start[]',null,['class'=>'form-control col',
                                isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
                            {{input_error($errors,'start[]')}}
                            </div>

                            <div class="form-group py-1 col-md-4">
                                <label for="formInputRole"> {{__('main.end')}}</label>
                                {!! Form::time('end[]',null,['class'=>'form-control col',
                                    isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
                            {{input_error($errors,'end[]')}}
                            </div>

                            <div class="form-group py-1 col-md-3">
                                <label for="number"> {{__('main.number')}}</label>
                                    {!! Form::number('number[]',null,['id'=>'number','class'=>'form-control col','min'=>'0','max'=>'100','placeholder'=>__("main.number"),
                                        isset($readOnly)?$readOnly:null,disable_on_show(),'required']) !!}
                                {{input_error($errors,'number[]')}}
                            </div>

                            <a href="#" class="btn btn-danger remove_input btn-sm mt-3 mb-3">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                    `);
                x++;
            }
            return false;
        });
        $(document).on('click', '.remove_input', function () {
            $(this).parent('div').remove();
            x--;
            return false;
        });
    </script>
@endsection
