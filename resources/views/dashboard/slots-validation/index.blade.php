@extends('dashboard.layouts.app')
@section('title'){!! __('main.slots_validation') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
        @include('dashboard.layouts.partials._breadcrumb',['level'=>'slots-validation'])
@endsection
@section('btn')@endsection
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
                                <a href="{{ route('admin.slots-validation.index') }}" class="btn btn-primary">{{ __('main.view_all') }}</a>
                                <a href="{{ route('admin.restoreAllSlotsValidation') }}" class="btn btn-success">{{ __('main.restore_all') }}</a>
                            @else
                                <a href="{{ route('admin.slots-validation.index', ['view_deleted' => 'DeletedRecords']) }}" class="btn btn-primary">{{ __('main.view_all_deleted') }}</a>
                            @endif

                            <div class="table-responsive">
                                @include('dashboard.slots-validation.partials._table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

