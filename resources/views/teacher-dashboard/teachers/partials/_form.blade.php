<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('main.first_name')}}</label>
    {!! Form::text('first_name',null,['class'=>'form-control col','placeholder'=>__("main.first_name"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'first_name')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('main.last_name')}}</label>
    {!! Form::text('last_name',null,['class'=>'form-control col','placeholder'=>__("main.last_name"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'last_name')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('main.email')}}</label>
    {!! Form::email('email',null,['class'=>'form-control col','placeholder'=>__("main.email"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'email')}}
</div>

<div class="form-group py-1 col-md-6 {{hidden_on_show()}}">
    <label for="formInputRole"> {{__('main.password')}} </label>
    {!! Form::password('password',['class'=>'form-control col',]) !!}
    {{input_error($errors,'password')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('main.phone')}}</label>
    {!! Form::text('phone',null,['class'=>'form-control col','placeholder'=>__("main.phone"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'phone')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('main.image')}}</label>
    <br>
    {!! Form::file('image',['class'=>'form-control col','placeholder'=>__("main.image"),'onchange'=>"loadImage(event)"]) !!}
    {{input_error($errors,'image')}}
</div>

<div class="form-group py-1 col-md-12">
    <label for="formInputRole"> {{__('main.address')}}</label>
    {!! Form::textarea('address',null,['class'=>'form-control col','rows'=>'3','placeholder'=>__("main.address"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'address')}}
</div>
