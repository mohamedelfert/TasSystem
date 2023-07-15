<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('Subject Name')}}</label>
    {!! Form::text('name',null,['class'=>'form-control col','placeholder'=>__("Subject Name"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'name')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('Price')}}</label>
    {!! Form::text('price',null,['class'=>'form-control col','placeholder'=>__("Price"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'price')}}
</div>

<div class="form-group py-1 col-md-12">
    <label for="formInputRole"> {{__('Systems')}}</label>
    {!! Form::select('system_id',App\Models\System::pluck('name','id'),request()->system_id ?? null,['class'=>'form-control col',
        'placeholder'=>__("Select System"),disable_on_show()]) !!}
    {{input_error($errors,'system_id')}}
</div>
