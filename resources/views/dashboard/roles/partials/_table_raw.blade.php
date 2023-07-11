<tr>
    <td>{!! $loop->index +1 !!}</td>
    <td>{!! $role->name !!}</td>
    <td>{!! $role->display_name !!}</td>
    <td>

        <div class="btn-group" role="group" aria-label="Vertical button group">
            <div class="btn-group" role="group">
                @component('dashboard.layouts.partials.buttons._show_button',[
                        'route' => route('admin.roles.show',$role->id),
                        'tooltip' => __('Show '.$role['name']),
                         ])
                @endcomponent
            </div>
            <div class="btn-group" role="group">
                @component('dashboard.layouts.partials.buttons._edit_button',[
                        'route' => route('admin.roles.edit',$role->id),
                        'tooltip' => __('Edit '.$role['name']),
                         ])
                @endcomponent
            </div>

            @if(auth()->user()->hasPermissionTo('role-delete'))
                @if ($role->name !== 'super_admin')
                    @can('role-delete')
                        <div class="btn-group" role="group">
                            @component('dashboard.layouts.partials.buttons._delete_button',[
                                            'id'=>$role->id,
                                            'route' => route('admin.roles.destroy',$role->id) ,
                                            'tooltip' => __('Delete'),
                                             ])
                            @endcomponent
                        </div>
                    @endcan
                @endif
            @else
                @if ($role->name !== 'super_admin')
                    <div class="btn-group" role="group">
                        @component('dashboard.layouts.partials.buttons._delete_button',[
                                        'id'=>$role->id,
                                        'route' => route('admin.roles.destroy',$role->id) ,
                                        'tooltip' => __('Delete'),
                                         ])
                        @endcomponent
                    </div>
                @endif
            @endif
        </div>
    </td>
</tr>

