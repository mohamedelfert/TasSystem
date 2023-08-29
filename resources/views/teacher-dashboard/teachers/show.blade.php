@extends('teacher-dashboard.layouts.app')
@section('title'){!! __('main.profile') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
    @include('teacher-dashboard.layouts.partials._breadcrumb',['level'=>'teachers'])
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
                                    <div class="tabs-menu1">
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab1" class="nav-link active" data-toggle="tab">{!! __('main.teacher_info') !!}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                            <div class="main-contact-info-body p-4">
                                                <div class="row">
                                                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-1">
                                                        <p class="text-muted">
                                                            <img class="round"
                                                                 @if($teacher->image_path)
                                                                     src="{{ $teacher->image_path }}"
                                                                 @else
                                                                     src="{{asset('assets/dashboard/resources')}}/app-assets/images/portrait/small/avatar-s-11.jpg"
                                                                 @endif alt="{!! __('main.image') !!}" style="width: 210px;height: 140px;">
                                                        </p>
                                                    </div>
                                                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-2">
                                                        <div class="media-list pb-0">
                                                            <div class="media">
                                                                <div class="media-body">
                                                                    <div>
                                                                        <label>{!! __('main.fullName') !!}</label> : <span class="tx-medium text-primary">{{ $teacher->first_name .' '. $teacher->last_name }}</span>
                                                                    </div>
                                                                    <div>
                                                                        <label>{!! __('main.email') !!}</label> : <span class="tx-medium text-primary">{{ $teacher->email }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="media">
                                                                <div class="media-body">
                                                                    <div>
                                                                        <label>{!! __('main.phone') !!}</label> : <span class="tx-medium text-danger">{{ $teacher->phone }}</span>
                                                                    </div>
                                                                    <div>
                                                                        <label>{!! __('main.address') !!}</label> : <span class="tx-medium text-info">{{ $teacher->address }}</span>
                                                                    </div>
                                                                    <div>
                                                                        <label>{!! __('main.status') !!}</label> :
                                                                        @if($teacher->status === 'active')
                                                                            <span class="badge badge-pill badge-success">{{ $teacher->status }}</span>
                                                                        @elseif($teacher->status === 'inactive')
                                                                            <span class="badge badge-pill badge-danger">{{ $teacher->status }}</span>
                                                                        @endif
                                                                    </div>
                                                                    <div>
                                                                        <label>{!! __('main.blocked') !!}</label> :
                                                                        @if($teacher->blocked === 'yes')
                                                                            <span class="badge badge-pill badge-success">{{ $teacher->blocked }}</span>
                                                                        @elseif($teacher->blocked === 'no')
                                                                            <span class="badge badge-pill badge-danger">{{ $teacher->blocked }}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="media mb-0">
                                                                <div class="media-body">
                                                                    <div>
                                                                        <label>{!! __('main.country') !!}</label> : <span class="tx-medium text-dark">{{ optional($teacher->country)->name }}</span>
                                                                    </div>
                                                                    <div>
                                                                        <label>{!! __('Language') !!}</label> :
                                                                        @if($teacher->language === 'arabic')
                                                                            <span class="badge badge-pill badge-success">{!! $teacher->language !!}</span>
                                                                        @elseif($teacher->language === 'english')
                                                                            <span class="badge badge-pill badge-primary">{!! $teacher->language !!}</span>
                                                                        @elseif($teacher->language === 'both')
                                                                            <span class="badge badge-pill badge-secondary">{!! $teacher->language !!}</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="media mb-0">
                                                                <div class="media-body">
                                                                    @if($teacher->id === auth()->user()->id)
                                                                        <div class="col-12 mb-3">
                                                                            <a href="{{ route('teacher.teachers.edit',$teacher->id) }}"
                                                                               class="btn btn-success btn-block" title="@lang('main.edit')">
                                                                                <i class="fa fa-edit"> @lang('main.edit') </i>
                                                                            </a>
                                                                        </div>
                                                                    @endif
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
