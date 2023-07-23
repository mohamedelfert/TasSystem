<div class="form-group py-1 col-md-6">
    <label for="name-ar"> {{__('main.subject_name_ar')}}</label>
    {!! Form::text('name[ar]',($subject ? $subject->getTranslation('name', 'ar') : null),['id'=>'name-ar','class'=>'form-control col','placeholder'=>__("main.subject_name_ar"),isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'name[ar]')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="name-en"> {{__('main.subject_name_en')}}</label>
    {!! Form::text('name[en]',($subject ? $subject->getTranslation('name', 'en') : null),['id'=>'name-en','class'=>'form-control col','placeholder'=>__("main.subject_name_en"),isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'name[en]')}}
</div>
<div class="form-group py-1 col-md-12">
    <label for="formInputRole"> {{__('main.system')}}</label>
    {!! Form::select('system_id',App\Models\System::pluck('name','id'),request()->system_id ?? null,['class'=>'form-control col',
        'placeholder'=>__("main.system"),disable_on_show()]) !!}
    {{input_error($errors,'system_id')}}
</div>
