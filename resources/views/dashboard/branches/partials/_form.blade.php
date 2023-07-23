<div class="form-group py-1 col-md-6">
    <label for="name-ar"> {{__('main.branch_name_ar')}}</label>
    {!! Form::text('name[ar]',($branch ? $branch->getTranslation('name', 'ar') : null),['id'=>'name-ar','class'=>'form-control col','placeholder'=>__("main.branch_name_ar"),isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'name[ar]')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="name-en"> {{__('main.branch_name_en')}}</label>
    {!! Form::text('name[en]',($branch ? $branch->getTranslation('name', 'en') : null),['id'=>'name-en','class'=>'form-control col','placeholder'=>__("main.branch_name_en"),isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'name[en]')}}
</div>

<div class="form-group py-1 col-md-12">
    <label for="formInputRole"> {{__('main.address')}}</label>
    {!! Form::text('address',null,['class'=>'form-control col','placeholder'=>__("main.address"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'address')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('main.email')}}</label>
    {!! Form::email('email',null,['class'=>'form-control col','placeholder'=>__("main.email"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'email')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('main.phone')}}</label>
    {!! Form::text('phone',null,['class'=>'form-control col','placeholder'=>__("main.phone"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'phone')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('main.status')}}</label>
    {!! Form::select('status',['open'=>__('main.open'),'close'=>__('main.close')] ,null,['class'=>'form-control mb-2','id'=>'status',disable_on_show()]) !!}
    {{input_error($errors,'status')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('main.countries')}}</label>
    {!! Form::select('country_id',App\Models\Country::pluck('name','id'),request()->country_id ?? null,['class'=>'form-control col',
        'placeholder'=>__("main.select_country"),disable_on_show()]) !!}
    {{input_error($errors,'country_id')}}
</div>


<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('main.latitude')}}</label>
    {!! Form::text('lat',null,['class'=>'form-control col','placeholder'=>__("main.latitude"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'lat')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('main.longitude')}}</label>
    {!! Form::text('lng',null,['class'=>'form-control col','placeholder'=>__("main.longitude"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'lng')}}
</div>
