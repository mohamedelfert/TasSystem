
<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('Name')}}</label>
    {!! Form::text('name',null,['class'=>'form-control col','placeholder'=>__("Name"),isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'name')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('First Name')}}</label>
    {!! Form::text('first_name',null,['class'=>'form-control col','placeholder'=>__("First Name"),isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'first_name')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('Last Name')}}</label>
    {!! Form::text('last_name',null,['class'=>'form-control col','placeholder'=>__("Last Name"),isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'last_name')}}

</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('Email')}} </label>
    {!! Form::email('email',null,['class'=>'form-control col',disable_on_show()]) !!}
    {{input_error($errors,'email')}}
</div>

@if(Route::is('admin.users.create'))
    <div class="form-group py-1 col-md-6 {{hidden_on_show()}}">
        <label for="formInputRole"> {{__('Password')}} </label>
        {!! Form::password('password',['class'=>'form-control col',]) !!}
        {{input_error($errors,'password')}}
    </div>

    <div class="form-group py-1 col-md-6 {{hidden_on_show()}}">
        <label for="formInputRole"> {{__('Confirm password')}} </label>
        {!! Form::password('password_confirmation',['class'=>'form-control col',hidden_on_show()]) !!}
        {{input_error($errors,'password_confirmation')}}
    </div>
@elseif((Route::is('admin.users.edit',$user->id)))

@endif

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('Status')}}</label>
    {!! Form::select('status',['active'=>__('active'),'deactivate'=>__('deactivate')] ,null,['class'=>'form-control mb-2','id'=>'status',disable_on_show()]) !!}
    {{input_error($errors,'status')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('Role')}}</label>
    {!! Form::select('role_name',Spatie\Permission\Models\Role::pluck('display_name','name'),request()->name ?? null,['class'=>'form-control col',
        'placeholder'=>__("Select Role"),disable_on_show()]) !!}
    {{input_error($errors,'role_name')}}
</div>







