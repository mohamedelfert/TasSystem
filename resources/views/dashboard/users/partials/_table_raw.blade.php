<tr>
    <td>{!! $loop->index +1 !!}</td>
    <td>{!! $user->first_name .' '. $user->last_name !!}</td>
    <td>{!! $user->email !!}</td>
    <td>
        @if($user->status === 'active')
            <span class="badge badge-pill badge-success">{{ $user->status }}</span>
        @elseif($user->status === 'deactivate')
            <span class="badge badge-pill badge-danger">{{ $user->status }}</span>
        @endif
    </td>
    <td>
        @if($user->role_name === 'super_admin')
            <span class="badge badge-pill badge-success">{{ $user->role_name }}</span>
        @elseif($user->role_name === 'admin')
            <span class="badge badge-pill badge-primary">{{ $user->role_name }}</span>
        @elseif($user->role_name === 'user')
            <span class="badge badge-pill badge-secondary">{{ $user->role_name }}</span>
        @endif
    </td>
    <td>

        <div class="btn-group" role="group" aria-label="Vertical button group">

            @can('user-show')
                <div class="btn-group" role="group">
                    @component('dashboard.layouts.partials.buttons._show_button',[
                            'route' => route('admin.users.show',$user->id),
                            'tooltip' => __('Show '.$user['name']),
                             ])
                    @endcomponent
                </div>
            @endcan

            @can('user-edit')
                <div class="btn-group" role="group">
                    @component('dashboard.layouts.partials.buttons._edit_button',[
                            'route' => route('admin.users.edit',$user->id),
                            'tooltip' => __('Edit '.$user['name']),
                             ])
                    @endcomponent
                </div>
            @endcan

            @can('user-delete')
                <div class="btn-group" role="group">
                    @component('dashboard.layouts.partials.buttons._delete_button',[
                                'id'=>$user->id,
                                'route' => route('admin.users.destroy',$user->id) ,
                                'tooltip' => __('Delete'),
                                 ])
                    @endcomponent
                </div>
            @endcan

        </div>
    </td>
</tr>

