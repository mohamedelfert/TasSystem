<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('Branch Name')}}</label>
    {!! Form::text('name',null,['class'=>'form-control col','placeholder'=>__("Branch Name"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'name')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('Address')}}</label>
    {!! Form::text('address',null,['class'=>'form-control col','placeholder'=>__("Address"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'address')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('Email')}}</label>
    {!! Form::email('email',null,['class'=>'form-control col','placeholder'=>__("Email"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'email')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('Phone')}}</label>
    {!! Form::text('phone',null,['class'=>'form-control col','placeholder'=>__("Phone"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'phone')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('Status')}}</label>
    {!! Form::select('status',['open'=>__('Open'),'close'=>__('Close')] ,null,['class'=>'form-control mb-2','id'=>'status',disable_on_show()]) !!}
    {{input_error($errors,'status')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('Countries')}}</label>
    {!! Form::select('country_id',App\Models\Country::pluck('name','id'),request()->country_id ?? null,['class'=>'form-control col',
        'placeholder'=>__("Select Country"),disable_on_show()]) !!}
    {{input_error($errors,'country_id')}}
</div>


<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('Latitude ')}}</label>
    {!! Form::text('lat',null,['class'=>'form-control col','placeholder'=>__("Latitude "),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'lat')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('Longitude')}}</label>
    {!! Form::text('lng',null,['class'=>'form-control col','placeholder'=>__("Longitude"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'lng')}}
</div>
