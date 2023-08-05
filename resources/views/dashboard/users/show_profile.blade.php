@extends('dashboard.layouts.app')
@section('title'){!! __('main.show_profile') !!}@endsection
@section('header')
    <style>
        .gradient-custom {
            background: #f6d365;
            background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));
            background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
        }
    </style>
@endsection
@section('breadcrumb')
    @include('dashboard.layouts.partials._breadcrumb',['level'=>'users'])
@endsection
@section('content')
    <section id="column-selectors">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="container py-5 h-100">
                                <div class="row d-flex justify-content-center align-items-center h-100">
                                    <div class="col col-lg-12 mb-4 mb-lg-0">
                                        <div class="card mb-3" style="border-radius: .5rem;">
                                            <div class="row g-0">
                                                <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                                    <img src="{{ $user->image_path }}"
                                                         alt="..." class="img-fluid my-5 br round" style="border-radius: 50%" width="150" height="150"
                                                    />
                                                    <h5>
                                                        @if ($user->role_name == 'super_admin')
                                                            {!! __('Super Admin') !!}
                                                        @elseif($user->role_name == 'admin')
                                                            {!! __('Admin') !!}
                                                        @elseif($user->role_name == 'user')
                                                            {!! __('User') !!}
                                                        @endif
                                                    </h5>
                                                    <i class="feather icon-user font-large-1 mb-5"></i>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body p-4">
                                                        <h6>{!! __('User Details') !!}</h6>
                                                        <hr class="mt-0 mb-4">
                                                        <div class="row pt-1">
                                                            <div class="col-6 mb-3">
                                                                <h6>{!! __('Full Name') !!}</h6>
                                                                <p class="label text-primary d-flex">{{ $user->first_name . ' ' . $user->last_name }}</p>
                                                            </div>
                                                            <div class="col-6 mb-3">
                                                                <h6>{!! __('Email') !!}</h6>
                                                                <p class="label text-warning d-flexd">{{ $user->email }}</p>
                                                            </div>
                                                        </div>
                                                        <hr class="mt-0 mb-4">
                                                        <div class="row pt-1">
                                                            <div class="col-6 mb-3">
                                                                <h6>{!! __('Status') !!}</h6>
                                                                <p class="text-muted">
                                                                    @if ($user->status == 'active')
                                                                        <span class="label text-success d-flex">{{ $user->status }}</span>
                                                                    @else
                                                                        <span class="label text-danger d-flex">{{ $user->status }}</span>
                                                                    @endif
                                                                </p>
                                                            </div>
                                                            <div class="col-6 mb-3">
                                                                <h6>{!! __('Created At') !!}</h6>
                                                                <p class="text-muted">
                                                                    <span class="label text-info d-flex">{{ $user->created_at }}</span>
                                                                </p>
                                                            </div>

                                                            @if($user->id === auth()->user()->id)
                                                                <div class="col-12 mb-3">
                                                                    @component('dashboard.layouts.partials.buttons._edit_button',[
                                                                                'route' => route('admin.editProfile',$user->id),
                                                                                'tooltip' => __('Edit '.$user['name']),
                                                                                 ])
                                                                    @endcomponent
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
    </section>
@endsection
