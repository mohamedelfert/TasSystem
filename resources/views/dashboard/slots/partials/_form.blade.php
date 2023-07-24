<div class="form-group py-1 col-md-12">
    <label for="formInputRole"> {{__('main.start_at')}}</label>
    {!! Form::time('start_at',null,['class'=>'form-control col',
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'start_at')}}
</div>

<div class="form-group py-1 col-md-12">
    <label for="formInputRole"> {{__('main.end_at')}}</label>
    {!! Form::time('end_at',null,['class'=>'form-control col',
        isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'end_at')}}
</div>

