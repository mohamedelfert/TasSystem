@extends('teacher-dashboard.layouts.app')
@section('title'){!! __('main.slots') !!}@endsection
@section('header')@endsection
@section('breadcrumb')
    @include('teacher-dashboard.layouts.partials._breadcrumb',['level'=>'slots'])
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
                                            <li><a href="#tab1" class="nav-link active" data-toggle="tab">{!! __('main.checkout') !!}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab1">
                                            <div class="main-contact-info-body p-4">
                                                <div class="row">
                                                    <div class="col-12 col-md-12 col-lg-12 order-1 order-md-1">
                                                        <div class="media-list pb-0">
                                                            <div class="row">
                                                                <div class="media col-12 col-md-12 col-lg-12">
                                                                    <div class="media-body">
                                                                        <div class="alert alert-warning text-center mb-2 col-12 col-md-12 col-lg-12">
                                                                            {{ __('main.message_for_edit_slot') }}<strong>$ {{ $details->price }}</strong>
                                                                            {{ __('main.or_you_can') }}
                                                                            <a href="{{ route('teacher.slots.index') }}">{{ __('main.go_back') }}</a>
                                                                        </div>

                                                                        <div class="alert alert-secondary text-center mb-2 col-12 col-md-12 col-lg-12">
                                                                            @php
                                                                                $old_day = \App\Models\Workday::where('id',$details->old_workday_id)->first();
                                                                                $old_slot = \App\Models\Slot::where('id',$details->old_slot_id)->first();
                                                                                $new_day = \App\Models\Workday::where('id',$details->workday_id)->first();
                                                                                $new_slot = \App\Models\Slot::where('id',$details->slot_id)->first();
                                                                            @endphp
                                                                            <strong class="text-dark">{{ __('main.from_day') }} : </strong><strong class="text-danger">{{ (app()->getLocale() == 'ar') ? $old_day->getTranslation('day', 'ar') : $old_day->getTranslation('day', 'en') }}</strong><br>
                                                                            <strong class="text-primary">{{ Carbon\Carbon::parse($old_slot->start_at)->timezone(auth()->user()->timezone)->format('g:i A') .' - '. Carbon\Carbon::parse($old_slot->end_at)->timezone(auth()->user()->timezone)->format('g:i A')  }}</strong><br>
                                                                            <strong class="text-dark">{{ __('main.to_day') }} : </strong><strong class="text-danger">{{ (app()->getLocale() == 'ar') ? $new_day->getTranslation('day', 'ar') : $new_day->getTranslation('day', 'en')  }}</strong><br>
                                                                            <strong class="text-primary">{{ Carbon\Carbon::parse($new_slot->start_at)->timezone(auth()->user()->timezone)->format('g:i A') .' - '. Carbon\Carbon::parse($new_slot->end_at)->timezone(auth()->user()->timezone)->format('g:i A')  }}</strong><br>
                                                                        </div>

                                                                        <div class="mb-2 col-12 col-md-12 col-lg-12">
                                                                            <form action="{{ route('teacher.slotFinePay') }}" method="post" id="payment-form">
                                                                                @csrf
                                                                                <div>
                                                                                    <input type="hidden" name="price" id="price" value="{{ $details->price }}"/>
                                                                                    <input type="hidden" name="old_workday_id" id="old_workday_id" value="{{ $details->old_workday_id }}"/>
                                                                                    <input type="hidden" name="old_slot_id" id="old_slot_id" value="{{ $details->old_slot_id }}"/>
                                                                                    <input type="hidden" name="workday_id" id="workday_id" value="{{ $details->workday_id }}"/>
                                                                                    <input type="hidden" name="slot_id" id="slot_id" value="{{ $details->slot_id }}"/>
                                                                                    <input type="hidden" name="teacher_id" id="teacher_id" value="{{ $details->teacher_id }}"/>
                                                                                    <input type="hidden" name="fine_type_id" id="fine_type_id" value="{{ $details->fine_type_id }}"/>
                                                                                </div>
                                                                                <button class="btn btn-success float-right ml-2 mt-2">  <i class="fa fa-dollar"> @lang('main.pay') </i></button>
                                                                            </form>
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
        </div>
    </div>
@endsection
