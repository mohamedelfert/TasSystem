@extends('dashboard.layouts.app')
@section('title'){!! __('main.countries') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
        @include('dashboard.layouts.partials._breadcrumb',['level'=>'countries'])
@endsection
@section('btn')
        @include('dashboard.layouts.partials._add_icon',['route'=>'countries'])
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
                                <a href="{{ route('admin.countries.index') }}" class="btn btn-primary">{{ __('main.view_all') }}</a>
                                <a href="{{ route('admin.restoreAllCountries') }}" class="btn btn-success">{{ __('main.restore_all') }}</a>
                            @else
                                <a href="{{ route('admin.countries.index', ['view_deleted' => 'DeletedRecords']) }}" class="btn btn-primary">{{ __('main.view_all_deleted') }}</a>
                            @endif

                            <div class="table-responsive">
                                @include('dashboard.countries.partials._table')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer')
    <script type="text/javascript">
        $('.show_confirm').click(function(e) {
            if(!confirm('Are you sure you want to delete this?')) {
                e.preventDefault();
            }
        });
    </script>
@endsection

