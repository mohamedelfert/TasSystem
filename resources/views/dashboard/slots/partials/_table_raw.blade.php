<tr>
    <td>{!! $loop->index +1 !!}</td>
    <td>{{ Carbon\Carbon::parse($slot->start_at)->format('g:i A') }}</td>
    <td>{{ Carbon\Carbon::parse($slot->end_at)->format('g:i A') }}</td>
    <td>

        <div class="btn-group" role="group" aria-label="Vertical button group">

            @can('slot-edit')
                <div class="btn-group" role="group">
                    @component('dashboard.layouts.partials.buttons._edit_button',[
                            'route' => route('admin.slots.edit',$slot->id),
                            'tooltip' => __('main.edit'),
                             ])
                    @endcomponent
                </div>
            @endcan

            @can('slot-delete')
                <div class="btn-group" role="group">
                    @component('dashboard.layouts.partials.buttons._delete_button',[
                                'id'=>$slot->id,
                                'route' => route('admin.slots.destroy',$slot->id) ,
                                'tooltip' => __('main.delete'),
                                 ])
                    @endcomponent
                </div>
            @endcan

        </div>
    </td>
</tr>

