<div class="form-group py-1 col-md-6">
    <label for="name-ar"> {{__('main.system_name_ar')}}</label>
    {!! Form::text('name[ar]',($system ? $system->getTranslation('name', 'ar') : null),['id'=>'name-ar','class'=>'form-control col','placeholder'=>__("main.system_name_ar")]) !!}
    {{input_error($errors,'name[ar]')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="name-en"> {{__('main.system_name_en')}}</label>
    {!! Form::text('name[en]',($system ? $system->getTranslation('name', 'en') : null),['id'=>'name-en','class'=>'form-control col','placeholder'=>__("main.system_name_en")]) !!}
    {{input_error($errors,'name[en]')}}
</div>

