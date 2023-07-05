@extends('dashboard.layouts.app')
@section('title'){!! __('Slots') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
        @include('dashboard.layouts.partials._breadcrumb',['level'=>'slots'])
@endsection
@section('btn')
        @include('dashboard.layouts.partials._add_icon',['route'=>'slots'])
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
                            <div class="table-responsive">
                                @include('dashboard.slots.partials._table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

