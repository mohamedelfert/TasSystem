@extends('dashboard.layouts.app')
@section('title')
    {!! __('main.settings') !!}
@endsection
@section('header')@endsection
@section('breadcrumb')
    @include('dashboard.layouts.partials._breadcrumb',['level'=>'settings'])
@endsection
@section('btn')
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    {!! Form::model(setting(),['method'=>'put','route'=>['admin.settings.update',setting()->id],'class'=>'form-horizontal','enctype' => 'multipart/form-data']  ) !!}
                    @csrf()

                    <div class="form-group row">
                        {!! Form::label('site_name_ar',trans('main.site_name_ar'),['class'=>'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('site_name_ar',setting()->site_name_ar,['class'=>'form-control','id'=>'site_name_ar','placeholder'=>@trans('main.site_name_ar'),'required']) !!}
                            @error('site_name_ar')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('site_name_en',trans('main.site_name_en'),['class'=>'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('site_name_en',setting()->site_name_en,['class'=>'form-control','id'=>'site_name_en','placeholder'=>@trans('main.site_name_en'),'required']) !!}
                            @error('site_name_en')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('email',trans('main.email'),['class'=>'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::email('email',setting()->email,['class'=>'form-control','id'=>'email','placeholder'=>@trans('main.email'),'required']) !!}
                            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('phone',trans('main.phone'),['class'=>'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('phone',setting()->phone,['class'=>'form-control','id'=>'phone','placeholder'=>@trans('main.phone'),'required']) !!}
                            @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('slots_number_validation',trans('main.slots_number_validation'),['class'=>'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::number('slots_number_validation',setting()->slots_number_validation,
                                ['class'=>'form-control','id'=>'slots_number_validation','placeholder'=>@trans('main.slots_number_validation'),
                                    'required','min'=>'1','max'=>'50']) !!}
                            @error('slots_number_validation')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('start_at',trans('main.start_at'),['class'=>'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::time('start_at',setting()->start_at,
                                ['class'=>'form-control','id'=>'start_at','placeholder'=>@trans('main.start_at'),'required']) !!}
                            @error('start_at')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('end_at',trans('main.end_at'),['class'=>'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::time('end_at',setting()->end_at,
                                ['class'=>'form-control','id'=>'end_at','placeholder'=>@trans('main.end_at'),'required']) !!}
                            @error('end_at')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('currency',trans('main.currency'),['class'=>'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('currency',setting()->currency,['class'=>'form-control','id'=>'currency','placeholder'=>@trans('main.currency'),'required']) !!}
                            @error('currency')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('address',trans('main.address'),['class'=>'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('address',setting()->address,['class'=>'form-control','id'=>'address','placeholder'=>@trans('main.address'),'required']) !!}
                            @error('address')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('logo',trans('main.logo'),['class'=>'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::file('logo',['class'=>'form-control logo']) !!}
                            @error('logo')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        @if(!empty(setting()->logo))
                            <div class="col-sm-6">
                                <img class="img-fluid mb-3 logo_preview" src="{{ setting()->logo_path }}"
                                     alt="{{@trans('main.logo')}}" style="width: 150px;height: 100px;">
                            </div>
                        @endif
                    </div>

                    <div class="form-group row">
                        {!! Form::label('icon',trans('main.icon'),['class'=>'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::file('icon',['class'=>'form-control icon']) !!}
                            @error('icon')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        @if(!empty(setting()->icon))
                            <div class="col-sm-6">
                                <img class="img-fluid mb-3 icon_preview" src="{{ setting()->icon_path }}"
                                     alt="{{@trans('main.icon')}}" style="width: 100px;height: 80px;">
                            </div>
                        @endif
                    </div>

                    <div class="form-group row">
                        {!! Form::label('facebook',trans('main.facebook'),['class'=>'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('facebook',setting()->facebook,['class'=>'form-control','id'=>'facebook','placeholder'=>@trans('main.facebook'),'required']) !!}
                            @error('facebook')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('twitter',trans('main.twitter'),['class'=>'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('twitter',setting()->twitter,['class'=>'form-control','id'=>'twitter','placeholder'=>@trans('main.twitter'),'required']) !!}
                            @error('twitter')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('instagram',trans('main.instagram'),['class'=>'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('instagram',setting()->instagram,['class'=>'form-control','id'=>'instagram','placeholder'=>@trans('main.instagram'),'required']) !!}
                            @error('instagram')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('description',trans('main.description'),['class'=>'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::textarea('description',setting()->description,['class'=>'form-control','rows'=>'5','placeholder'=>@trans('main.description')]) !!}
                            @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('keywords',trans('main.keywords'),['class'=>'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::textarea('keywords',setting()->keywords,['class'=>'form-control','rows'=>'5','placeholder'=>@trans('main.keywords')]) !!}
                            @error('keywords')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('main_lang',trans('main.main_lang'),['class'=>'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::select('main_lang',['arabic' => trans('main.arabic'), 'english' => trans('main.english')],
                            setting()->main_lang,['class'=>'custom-select rounded-0','placeholder'=>@trans('main.choose_lang'),'required']) !!}
                            @error('main_lang')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('status',trans('main.status'),['class'=>'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::select('status',['open' => trans('main.open'), 'close' => trans('main.close')],
                            setting()->status,['class'=>'custom-select rounded-0','placeholder'=>@trans('main.choose_status'),'required']) !!}
                            @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label('message_maintenance',trans('main.message_maintenance'),['class'=>'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::textarea('message_maintenance',setting()->message_maintenance,['class'=>'form-control','rows'=>'5','placeholder'=>@trans('main.message_maintenance')]) !!}
                            @error('message_maintenance')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="mb-3" style="margin-top: 5px">
                        @if(auth()->user()->hasPermissionTo('setting-edit'))
                            @component('dashboard.layouts.partials.buttons._save_button',[])
                            @endcomponent
                        @else
                        @endif
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script type="text/javascript">
        $('.logo').change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.logo_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }
        });

        $('.icon').change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.icon_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
@endsection
