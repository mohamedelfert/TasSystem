<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('main.first_name')}}</label>
    {!! Form::text('first_name',null,['class'=>'form-control col','placeholder'=>__("First Name"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'first_name')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('main.last_name')}}</label>
    {!! Form::text('last_name',null,['class'=>'form-control col','placeholder'=>__("Last Name"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'last_name')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('main.email')}}</label>
    {!! Form::email('email',null,['class'=>'form-control col','placeholder'=>__("Email"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'email')}}
</div>

<div class="form-group py-1 col-md-6 {{hidden_on_show()}}">
    <label for="formInputRole"> {{__('main.password')}} </label>
    {!! Form::password('password',['class'=>'form-control col',]) !!}
    {{input_error($errors,'password')}}
</div>


@if(Route::is('admin.teachers.create'))
    <div class="form-group py-1 col-md-4">
        <label for="formInputRole"> {{__('main.phone')}}</label>
        {!! Form::text('phone',null,['class'=>'form-control col','placeholder'=>__("Phone"),
            isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
        {{input_error($errors,'phone')}}
    </div>

    <div class="form-group py-1 col-md-4">
        <label for="formInputRole"> {{__('main.countries')}}</label>
        {!! Form::select('country_id',App\Models\Country::pluck('name','id'),request()->country_id ?? null,['class'=>'form-control col',
            'placeholder'=>__("main.select_country"),disable_on_show()]) !!}
        {{input_error($errors,'country_id')}}
    </div>

    <div class="form-group py-1 col-md-4">
        <label for="formInputRole"> {{__('main.timezone')}}</label>
        {!! $timezone_select !!}
    </div>
@elseif(Route::is('admin.teachers.edit'))
    <div class="form-group py-1 col-md-6">
        <label for="formInputRole"> {{__('main.phone')}}</label>
        {!! Form::text('phone',null,['class'=>'form-control col','placeholder'=>__("Phone"),
            isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
        {{input_error($errors,'phone')}}
    </div>

    <div class="form-group py-1 col-md-6">
        <label for="formInputRole"> {{__('main.countries')}}</label>
        {!! Form::select('country_id',App\Models\Country::pluck('name','id'),request()->country_id ?? null,['class'=>'form-control col',
            'placeholder'=>__("main.select_country"),disable_on_show()]) !!}
        {{input_error($errors,'country_id')}}
    </div>

    <div class="form-group py-1 col-md-6">
        <label for="formInputRole"> {{__('main.status')}}</label>
        {!! Form::select('status',['active'=>__('main.active'),'inactive'=>__('main.inactive')] ,null,['class'=>'form-control mb-2','id'=>'status',disable_on_show()]) !!}
        {{input_error($errors,'status')}}
    </div>

    <div class="form-group py-1 col-md-6">
        <label for="formInputRole"> {{__('main.work')}}</label>
        {!! Form::select('work',['yes'=>__('main.yes'),'no'=>__('main.no')] ,null,['class'=>'form-control mb-2','id'=>'work',disable_on_show()]) !!}
        {{input_error($errors,'work')}}
    </div>
@endif

<div class="form-group py-1 col-md-12">
    <label for="formInputRole"> {{__('main.address')}}</label>
    {!! Form::textarea('address',null,['class'=>'form-control col','rows'=>'3','placeholder'=>__("Address"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'address')}}
</div>
