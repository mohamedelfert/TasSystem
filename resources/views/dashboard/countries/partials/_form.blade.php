<div class="form-group py-1 col-md-6">
    <label for="name-ar"> {{__('main.country_name_ar')}}</label>
    {!! Form::text('name[ar]',($country ? $country->getTranslation('name', 'ar') : null),['id'=>'name-ar','class'=>'form-control col','placeholder'=>__("main.country_name_ar")]) !!}
    {{input_error($errors,'name[ar]')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="name-en"> {{__('main.country_name_en')}}</label>
    {!! Form::text('name[en]',($country ? $country->getTranslation('name', 'en') : null),['id'=>'name-en','class'=>'form-control col','placeholder'=>__("main.country_name_en")]) !!}
    {{input_error($errors,'name[en]')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="code"> {{__('main.code')}}</label>
    {!! Form::text('code',null,['id'=>'code','class'=>'form-control col','placeholder'=>__("main.code"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'code')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="status"> {{__('main.select_status')}}</label>
    {!! Form::select('status',['active'=>__('main.active'),'inactive'=>__('main.inactive')] ,null,['class'=>'form-control mb-2','id'=>'status',disable_on_show()]) !!}
    {{input_error($errors,'status')}}
</div>
