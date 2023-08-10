<div class="form-group py-1 col-md-4">
    <label for="formInputRole"> {{__('main.start')}}</label>
    {!! Form::time('start',null,['class'=>'form-control col',
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'start')}}
</div>

<div class="form-group py-1 col-md-4">
    <label for="formInputRole"> {{__('main.end')}}</label>
    {!! Form::time('end',null,['class'=>'form-control col',
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'end')}}
</div>

<div class="form-group py-1 col-md-4">
    <label for="number"> {{__('main.number')}}</label>
    {!! Form::number('number',null,['id'=>'number','class'=>'form-control col','min'=>'0','max'=>'100','placeholder'=>__("main.number"),
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'number')}}
</div>
