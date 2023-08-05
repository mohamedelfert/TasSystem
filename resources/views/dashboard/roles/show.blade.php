@extends('dashboard.layouts.app')
@section('title'){!! __('main.show_role') !!}@endsection
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
                            <ul id="treeview1">
                                <li><a class="text-primary"> {{ ucfirst($role->name) }} - {{ ucfirst($role->display_name) }}</a>
                                    <ul>
                                        @if(!empty($rolePermissions))
                                            @foreach($rolePermissions as $permission)
                                                <li>{{ $permission->name }} - {{ $permission->display_name }}</li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('footer')
    <script src="{{ asset('assets/dashboard/resources') }}/app-assets/css/plugins/treeview/treeview.js"></script>
@endsection
