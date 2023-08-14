@extends('teacher-dashboard.layouts.app')
@section('title'){!! __('main.home') !!}@endsection
@section('header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
@endsection
@section('content')
    <section id="column-selectors">
        <div class="col-xl-12 col-md-12 col-12">
            <div class="card card-statistics">
                <div class="card-header">
                    <h4 class="card-title">{{__('main.statistics')}}</h4>
                </div>

                <div class="card-body statistics-body">
                    <div class="row">
                        <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                            <div class="card card-statistics h-100">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <span class="text-danger">
                                                <i class="fa fa-clock-o highlight-icon fa-3x" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                        <div class="float-right text-right">
                                            <p class="card-text text-dark">{{__('main.slots')}}</p>
                                            <h4>
                                                {{ \App\Models\SlotTeacher::where('teacher_id', auth()->user()->id)->count() }}
                                            </h4>
                                        </div>
                                    </div>
                                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                        <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>
                                        <a href="{{ route('teacher.slots.index') }}">{{__('main.show')}}</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                            <div class="card card-statistics h-100">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <span class="text-warning">
                                                <i class="fa fa-shopping-cart highlight-icon fa-3x" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                        <div class="float-right text-right">
                                            <p class="card-text text-dark">{{__('main.orders')}}</p>
                                            <h4>
                                                {{ \App\Models\Order::with('teacher')->where('teacher_id', auth()->user()->id)->count() }}
                                            </h4>
                                        </div>
                                    </div>
                                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                        <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>
                                        <a href="{{ route('teacher.orders.index') }}">{{__('main.show')}}</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6 col-12 mb-2 mb-xl-0">
                            <div class="card card-statistics h-100">
                                <div class="card-body">
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <span class="text-dark">
                                                <i class="fa fa-dollar highlight-icon fa-3x" aria-hidden="true"></i>
                                            </span>
                                        </div>
                                        <div class="float-right text-right">
                                            <p class="card-text text-dark">{{__('main.fines')}}</p>
                                            <h4>
                                                {{ \App\Models\Fine::with('teacher')->where('teacher_id', auth()->user()->id)->count() }}
                                            </h4>
                                        </div>
                                    </div>
                                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                        <i class="fa fa-exclamation-circle mr-1" aria-hidden="true"></i>
                                        <a href="{{ route('teacher.fines.index') }}">{{__('main.show')}}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="col-xl-12 col-md-12 col-12">
        <div class="row">
            <div class="col-xl-4 col-sm-4 col-4 mb-2 mb-xl-0 float-left">
                <div class="card card-statistics">
                    <div class="card-header">
                        <h4 class="card-title">{{__('main.statistics')}}</h4>
                    </div>
                    <div class="card-body statistics-body">
                        <div class="row">
                            <div class="card-body" style="width:100%;">
                                {!! $chartjs->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-8 col-sm-8 col-8 mb-2 mb-xl-0 float-right">
                <div class="card card-statistics">
                    <div class="card-header">
                        <h4 class="card-title">{{__('main.calendar')}}</h4>
                    </div>
                    <div class="card-body statistics-body">
                        <div class="row">
                            <div id='calendar'></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script src="{{URL::asset('assets/dashboard/resources/app-assets/js/scripts/charts/chart-chartjs.js')}}"></script>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script>
        $(document).ready(function() {
            // page is now ready, initialize the calendar...
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                events : [
                        @foreach($slots as $slot)
                        {
                            title : '{{ $slot->slot_id }}',
                            start : '{{ $slot->workday_id }}',
                        },
                        @endforeach
                ]
            })
        });
    </script>
@endsection
