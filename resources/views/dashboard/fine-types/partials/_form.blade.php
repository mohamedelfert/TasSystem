<div class="form-group py-1 col-md-6">
    <label for="name-ar"> {{__('main.fine_name_ar')}}</label>
    {!! Form::text('name[ar]',($fineType ? $fineType->getTranslation('name', 'ar') : null),['id'=>'name-ar','class'=>'form-control col','placeholder'=>__("main.fine_name_ar")]) !!}
    {{input_error($errors,'name[ar]')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="name-en"> {{__('main.fine_name_en')}}</label>
    {!! Form::text('name[en]',($fineType ? $fineType->getTranslation('name', 'en') : null),['id'=>'name-en','class'=>'form-control col','placeholder'=>__("main.fine_name_en")]) !!}
    {{input_error($errors,'name[en]')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="price"> {{__('main.price')}}</label>
    {!! Form::number('price',null,['id'=>'price','class'=>'form-control col','min'=>'0','max'=>'1000','placeholder'=>__("main.price"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'price')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('main.type')}}</label>
    {!! Form::select('type',['edit'=>__('main.edit'),'cancel'=>__('main.cancel'),'delete'=>__('main.delete'),'delay'=>__('main.delay')] ,null,['class'=>'form-control mb-2','id'=>'type',disable_on_show()]) !!}
    {{input_error($errors,'type')}}
</div>
