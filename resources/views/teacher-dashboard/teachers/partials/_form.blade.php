<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('First Name')}}</label>
    {!! Form::text('first_name',null,['class'=>'form-control col','placeholder'=>__("First Name"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'first_name')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('Last Name')}}</label>
    {!! Form::text('last_name',null,['class'=>'form-control col','placeholder'=>__("Last Name"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'last_name')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('Email')}}</label>
    {!! Form::email('email',null,['class'=>'form-control col','placeholder'=>__("Email"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'email')}}
</div>

<div class="form-group py-1 col-md-6 {{hidden_on_show()}}">
    <label for="formInputRole"> {{__('Password')}} </label>
    {!! Form::password('password',['class'=>'form-control col',]) !!}
    {{input_error($errors,'password')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('Phone')}}</label>
    {!! Form::text('phone',null,['class'=>'form-control col','placeholder'=>__("Phone"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'phone')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('Countries')}}</label>
    {!! Form::select('country_id',App\Models\Country::pluck('name','id'),request()->country_id ?? null,['class'=>'form-control col',
        'placeholder'=>__("Select Country"),disable_on_show()]) !!}
    {{input_error($errors,'country_id')}}
</div>

<div class="form-group py-1 col-md-12">
    <label for="formInputRole"> {{__('Address')}}</label>
    {!! Form::textarea('address',null,['class'=>'form-control col','rows'=>'3','placeholder'=>__("Address"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'address')}}
</div>

<div class="form-group py-1 col-md-12">
    <label for="formInputRole"> {{__('Image')}}</label>
    <br>
    {!! Form::file('image',['class'=>'form-control col','placeholder'=>__("Image"),'onchange'=>"loadImage(event)"]) !!}
    {{input_error($errors,'image')}}
</div>
