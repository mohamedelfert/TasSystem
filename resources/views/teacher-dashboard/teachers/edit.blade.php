@extends('teacher-dashboard.layouts.app')
@section('title')
    {!! __('main.edit_profile') !!}
@endsection
@section('header')@endsection
@section('breadcrumb')
    @include('teacher-dashboard.layouts.partials._breadcrumb',['level'=>'teachers'])
@endsection
@section('content')
    <section id="column-selectors">
        <div class="row">
            <div class="col-12">
                <div class="card">

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

                            {!! Form::model($teacher,['method'=>'put','route'=>['teacher.teachers.update',$teacher->id],'class'=>'form','enctype' => 'multipart/form-data']  ) !!}
                            @csrf()
                            <div class="row">
                                @include('teacher-dashboard.teachers.partials._form')
                                @component('teacher-dashboard.layouts.partials.buttons._save_button',[])
                                @endcomponent
                                <div class="col-12">
                                    <a href="{{ route('teacher.teachers.show',$teacher->id) }}"
                                       class="btn btn-outline-primary mr-1 mb-1 waves-effect waves-light" title="@lang('main.back')">
                                        {{__('main.back')}}
                                    </a>
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
