@extends('teacher-dashboard.layouts.app')
@section('title'){!! __('main.fines') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
    @include('teacher-dashboard.layouts.partials._breadcrumb',['level'=>'fines'])
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
                                    {!! __('main.fines') !!}
                                </div>
                                <hr>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table text-md-nowrap" id="example1">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-5p border-bottom-0">#</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('main.subject') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('main.fine_type') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('main.price') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('main.status') !!}</th>
                                                        <th class="wd-10p border-bottom-0">{!! __('main.payment_date') !!}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($fines->count() > 0)
                                                        @foreach ($fines as $index => $fine)
                                                            <tr>
                                                                <th class="wd-5p border-bottom-0">{{ $index + 1 }}</th>
                                                                <th class="wd-10p border-bottom-0">
{{--                                                                    {{ optional($fine->model->subject)->name }}--}}
                                                                    -
                                                                </th>
                                                                <th class="wd-10p border-bottom-0">
                                                                    @if($fine->fine_type_id === 1)
                                                                        <span class="badge badge-pill badge-light-danger">
                                                                            {{ optional($fine->fineType)->getTranslation('name','en') }}
                                                                        </span>
                                                                    @elseif($fine->fine_type_id === 2)
                                                                        <span class="badge badge-pill badge-light-warning">
                                                                            {{ optional($fine->fineType)->getTranslation('name','en') }}
                                                                        </span>
                                                                    @else
                                                                        <span class="badge badge-pill badge-light-success">
                                                                            {{ optional($fine->fineType)->getTranslation('name','en') }}
                                                                        </span>
                                                                    @endif
                                                                </th>
                                                                <th class="wd-10p border-bottom-0">
                                                                    <span class="badge badge-pill badge-warning">
                                                                        {{ $fine->price }} $
                                                                    </span>
                                                                </th>
                                                                <th class="wd-10p border-bottom-0">
                                                                    @if($fine->status === 'paid')
                                                                        <span class="badge badge-pill badge-primary">
                                                                            {{ $fine->status }}
                                                                        </span>
                                                                    @elseif($fine->status === 'unpaid')
                                                                        <span class="badge badge-pill badge-danger">
                                                                            {{ $fine->status }}
                                                                        </span>
                                                                    @endif
                                                                </th>
                                                                <th class="wd-10p border-bottom-0">
                                                                    <span class="badge badge-pill badge-success">
                                                                        {{ $fine->payment_date }}
                                                                    </span>
                                                                </th>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <table class="table table-hover" id="example1" data-page-length='50' style=" text-align: center;">
                                                            <tbody>
                                                            <tr>
                                                                <td colspan="4" class="text-center text-danger">{!! __('main.no_data_found') !!}</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    @endif
                                                </tbody>
                                            </table>
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
