<div class="form-group py-1 col-md-6">
    <label for="name-ar"> {{__('main.payment_method_ar')}}</label>
    {!! Form::text('name[ar]',($paymentMethod ? $paymentMethod->getTranslation('name', 'ar') : null),['id'=>'name-ar','class'=>'form-control col','placeholder'=>__("main.payment_method_ar"),isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'name[ar]')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="name-en"> {{__('main.payment_method_en')}}</label>
    {!! Form::text('name[en]',($paymentMethod ? $paymentMethod->getTranslation('name', 'en') : null),['id'=>'name-en','class'=>'form-control col','placeholder'=>__("main.payment_method_en"),isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'name[en]')}}
</div>
