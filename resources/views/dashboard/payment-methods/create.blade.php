@extends('dashboard.layouts.app')
@section('title'){!! __('main.create_payment_method') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
    @include('dashboard.layouts.partials._breadcrumb',['level'=>'payment-methods'])
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

                            {!! Form::open(['method'=>'post','route'=>'admin.payment-methods.store','class'=>'form','enctype' => 'multipart/form-data']) !!}
                            @csrf()
                            <div class="row">
                                @include('dashboard.payment-methods.partials._form')
                                @component('dashboard.layouts.partials.buttons._save_button',[])
                                @endcomponent
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
