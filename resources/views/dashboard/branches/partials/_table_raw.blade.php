<tr>
    <td>{!! $loop->index +1 !!}</td>
    <td>{!! $branch->name !!}</td>
    <td>{!! $branch->phone !!}</td>
    <td>{!! $branch->email !!}</td>
    <td>
        @if($branch->status === 'open')
            <span class="badge badge-pill badge-success">{{ $branch->status }}</span>
        @elseif($branch->status === 'close')
            <span class="badge badge-pill badge-danger">{{ $branch->status }}</span>
        @endif
    </td>
    <td>

        <div class="btn-group" role="group" aria-label="Vertical button group">
            <div class="btn-group" role="group">
                @component('dashboard.layouts.partials.buttons._show_button',[
                            'route' => route('admin.branches.show',$branch->id),
                            'tooltip' => __('Edit '.$branch['name']),
                             ])
                @endcomponent
            </div>
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._edit_button',[
                        'route' => route('admin.branches.edit',$branch->id),
                        'tooltip' => __('Edit '.$branch['name']),
                         ])
                @endcomponent
            </div>
                <div class="btn-group" role="group">
                    @component('dashboard.layouts.partials.buttons._delete_button',[
                                    'id'=>$branch->id,
                                    'route' => route('admin.branches.destroy',$branch->id) ,
                                    'tooltip' => __('Delete'),
                                     ])
                    @endcomponent
            </div>

        </div>

    </td>
</tr>

