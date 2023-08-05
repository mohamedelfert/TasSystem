
<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('main.name')}}</label>
    {!! Form::text('name',null,['class'=>'form-control col','placeholder'=>__("main.name"),isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'name')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('main.first_name')}}</label>
    {!! Form::text('first_name',null,['class'=>'form-control col','placeholder'=>__("main.first_name"),isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'first_name')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('main.last_name')}}</label>
    {!! Form::text('last_name',null,['class'=>'form-control col','placeholder'=>__("main.last_name"),isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'last_name')}}

</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('main.email')}} </label>
    {!! Form::email('email',null,['class'=>'form-control col',disable_on_show()]) !!}
    {{input_error($errors,'email')}}
</div>

@if(Route::is('admin.users.create'))
    <div class="form-group py-1 col-md-6 {{hidden_on_show()}}">
        <label for="formInputRole"> {{__('main.password')}} </label>
        {!! Form::password('password',['class'=>'form-control col',]) !!}
        {{input_error($errors,'password')}}
    </div>

    <div class="form-group py-1 col-md-6 {{hidden_on_show()}}">
        <label for="formInputRole"> {{__('main.confirm_password')}} </label>
        {!! Form::password('password_confirmation',['class'=>'form-control col',hidden_on_show()]) !!}
        {{input_error($errors,'password_confirmation')}}
    </div>
@elseif(Route::is('admin.users.edit',$user->id) || Route::is('admin.editProfile',$user->id))
    @if(auth()->user()->id === $user->id)
        <div class="form-group py-1 col-md-6 {{hidden_on_show()}}">
            <label for="formInputRole"> {{__('main.password')}} </label>
            {!! Form::password('password',['class'=>'form-control col',]) !!}
            {{input_error($errors,'password')}}
        </div>

        <div class="form-group py-1 col-md-6 {{hidden_on_show()}}">
            <label for="formInputRole"> {{__('main.confirm_password')}} </label>
            {!! Form::password('password_confirmation',['class'=>'form-control col',hidden_on_show()]) !!}
            {{input_error($errors,'password_confirmation')}}
        </div>

        <div class="form-group py-1 col-md-12">
            <label for="formInputRole"> {{__('main.image')}}</label>
            <br>
            {!! Form::file('image',['class'=>'form-control col','placeholder'=>__("main.image"),'onchange'=>"loadImage(event)"]) !!}
            {{input_error($errors,'image')}}
        </div>
    @endif
@endif

@if(auth()->user()->role_name !== 'super_admin')
@else
    <div class="form-group py-1 col-md-6">
        <label for="formInputRole"> {{__('main.status')}}</label>
        {!! Form::select('status',['active'=>__('active'),'deactivate'=>__('deactivate')] ,null,['class'=>'form-control mb-2','id'=>'status',disable_on_show()]) !!}
        {{input_error($errors,'status')}}
    </div>

    <div class="form-group py-1 col-md-6">
        <label for="formInputRole"> {{__('main.roles')}}</label>
        {!! Form::select('role_name',Spatie\Permission\Models\Role::pluck('display_name','name'),request()->name ?? null,['class'=>'form-control col',
            'placeholder'=>__("Select Role"),disable_on_show()]) !!}
        {{input_error($errors,'role_name')}}
    </div>
@endif
