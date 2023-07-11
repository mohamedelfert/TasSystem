@extends('dashboard.layouts.app')
@section('title'){!! __('Create Role') !!}@endsection
@section('header')
    <link href="{{ asset('assets/dashboard/resources') }}/app-assets/css/plugins/treeview/treeview.css" rel="stylesheet" type="text/css"/>
@endsection
@section('breadcrumb')
    @include('dashboard.layouts.partials._breadcrumb',['level'=>'roles'])
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
                            {!! Form::open(['method'=>'post','route'=>'admin.roles.store','class'=>'form','enctype' => 'multipart/form-data']) !!}
                            @csrf()
                            <div class="row">
                                @include('dashboard.roles.partials._form')
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
@section('footer')
    <script src="{{ asset('assets/dashboard/resources') }}/app-assets/css/plugins/treeview/treeview.js"></script>
@endsection
