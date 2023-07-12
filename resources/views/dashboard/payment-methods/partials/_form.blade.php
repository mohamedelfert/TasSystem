<div class="form-group py-1 col-md-12">
    <label for="formInputRole"> {{__('Payment Method')}}</label>
    {!! Form::text('name',null,['class'=>'form-control col','placeholder'=>__("Payment Method"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'name')}}
</div>

