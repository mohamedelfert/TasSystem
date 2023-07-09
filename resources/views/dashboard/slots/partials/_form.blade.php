<div class="form-group py-1 col-md-12">
    <label for="formInputRole"> {{__('Slot Name')}}</label>
    {!! Form::text('name',null,['class'=>'form-control col','placeholder'=>__("Slot Name"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'name')}}
</div>

<div class="form-group py-1 col-md-12">
    <label for="formInputRole"> {{__('Start At')}}</label>
    {!! Form::time('start_at',null,['class'=>'form-control col',
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'start_at')}}
</div>

<div class="form-group py-1 col-md-12">
    <label for="formInputRole"> {{__('End At')}}</label>
    {!! Form::time('end_at',null,['class'=>'form-control col',
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'end_at')}}
</div>

