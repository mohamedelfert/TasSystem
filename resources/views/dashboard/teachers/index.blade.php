@extends('dashboard.layouts.app')
@section('title'){!! __('Teachers') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
        @include('dashboard.layouts.partials._breadcrumb',['level'=>'teachers'])
@endsection
@section('btn')
        @include('dashboard.layouts.partials._add_icon',['route'=>'teachers'])
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

                            @if(request()->has('view_deleted'))
                                <a href="{{ route('admin.teachers.index') }}" class="btn btn-primary">{{ __('main.view_all') }}</a>
                                <a href="{{ route('admin.restoreAllPaymentMethods') }}" class="btn btn-success">{{ __('main.restore_all') }}</a>
                            @else
                                <a href="{{ route('admin.teachers.index', ['view_deleted' => 'DeletedRecords']) }}" class="btn btn-primary">{{ __('main.view_all_deleted') }}</a>
                            @endif

                            <div class="table-responsive">
                                @include('dashboard.teachers.partials._table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

