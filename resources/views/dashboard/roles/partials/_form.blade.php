<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('Name')}}</label>
    {!! Form::text('name',null,['class'=>'form-control col','placeholder'=>__("Name"),isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'name')}}
</div>

<div class="form-group py-1 col-md-6">
    <label for="formInputRole"> {{__('Display Name')}}</label>
    {!! Form::text('display_name',null,['class'=>'form-control col','placeholder'=>__("Display Name"),isset($readOnly)?$readOnly:null,disable_on_show()]) !!}
    {{input_error($errors,'display_name')}}
</div>

@if(Route::is('admin.roles.create'))
    <div class="form-group py-1 col-md-6">
        <label for="formInputRole"> {{__('Roles List')}}</label>
        <ul id="treeview1">
            <li> <i class="feather icon-plus-circle"></i> <a class="text-primary"> {{__('Roles List')}} </a>
                <ul>
                    <li>
                        @foreach($permissions as $permission)
                            <label style="font-size: 16px;">
                                {{ Form::checkbox('permissions[]', $permission->id, false, ['class' => 'name']) }}
                                {{ $permission->name }}
                            </label>
                        @endforeach
                    </li>
                </ul>
            </li>
        </ul>
    </div>
@elseif(Route::is('admin.roles.edit',$role->id))
    <div class="form-group py-1 col-md-6">
        <label for="formInputRole"> {{__('Roles List')}}</label>
        <ul id="treeview1">
            <li> <i class="feather icon-plus-circle"></i> <a class="text-primary"> {{__('Roles List')}} </a>
                <ul>
                    <li>
                        @foreach($permissions as $permission)
                            <label>{{ Form::checkbox('permissions[]', $permission->id, in_array($permission->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                {{ $permission->name }}
                            </label>
                        @endforeach
                    </li>
                </ul>
            </li>
        </ul>
    </div>
@endif
