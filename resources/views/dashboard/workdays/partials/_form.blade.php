<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('Workday')}}</label>
    {!! Form::text('day',null,['class'=>'form-control col','placeholder'=>__("Workday"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'day')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('Date')}}</label>
    {!! Form::date('date',null,['class'=>'form-control col',
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'date')}}
</div>

<div class="form-group py-1 col-md-12">
    <label for="formInputRole"> {{__('Slot Name')}}</label>
    {!! Form::select('name_slot',App\Models\Slot::pluck('name','id'),request()->name_slot ?? null,['class'=>'form-control col',
        'placeholder'=>__("Select Slot Name"),disable_on_show()]) !!}
    {{input_error($errors,'name_slot')}}
</div>

