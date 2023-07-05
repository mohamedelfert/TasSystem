<tr>
    <td>{!! $loop->index +1 !!}</td>
    <td>{!! $slot->name !!}</td>
    <td>{{ Carbon\Carbon::parse($slot->start_at)->format('g:i A') }}</td>
    <td>{{ Carbon\Carbon::parse($slot->end_at)->format('g:i A') }}</td>
    <td>

        <div class="btn-group" role="group" aria-label="Vertical button group">
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._edit_button',[
                        'route' => route('dashboard.slots.edit',$slot->id),
                        'tooltip' => __('Edit '.$slot['name']),
                         ])
                @endcomponent
            </div>
                <div class="btn-group" role="group">
                    @component('dashboard.layouts.partials.buttons._delete_button',[
                                    'id'=>$slot->id,
                                    'route' => route('dashboard.slots.destroy',$slot->id) ,
                                    'tooltip' => __('Delete'),
                                     ])
                    @endcomponent
            </div>

        </div>

    </td>
</tr>

