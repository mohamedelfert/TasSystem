<tr>
    <td>{!! $loop->index +1 !!}</td>
    <td>{!! $branch->name !!}</td>
    <td>{!! $branch->phone !!}</td>
    <td>{!! $branch->email !!}</td>
    <td>{!! $branch->status !!}</td>
    <td>

        <div class="btn-group" role="group" aria-label="Vertical button group">
            <div class="btn-group" role="group">
                @component('dashboard.layouts.partials.buttons._show_button',[
                            'route' => route('dashboard.branches.show',$branch->id),
                            'tooltip' => __('Edit '.$branch['name']),
                             ])
                @endcomponent
            </div>
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._edit_button',[
                        'route' => route('dashboard.branches.edit',$branch->id),
                        'tooltip' => __('Edit '.$branch['name']),
                         ])
                @endcomponent
            </div>
                <div class="btn-group" role="group">
                    @component('dashboard.layouts.partials.buttons._delete_button',[
                                    'id'=>$branch->id,
                                    'route' => route('dashboard.branches.destroy',$branch->id) ,
                                    'tooltip' => __('Delete'),
                                     ])
                    @endcomponent
            </div>

        </div>

    </td>
</tr>

