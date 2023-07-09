<tr>
    <td>{!! $loop->index +1 !!}</td>
    <td>{!! $system->name !!}</td>
    <td>

        <div class="btn-group" role="group" aria-label="Vertical button group">
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._edit_button',[
                        'route' => route('dashboard.systems.edit',$system->id),
                        'tooltip' => __('Edit '.$system['name']),
                         ])
                @endcomponent
            </div>
                <div class="btn-group" role="group">
                    @component('dashboard.layouts.partials.buttons._delete_button',[
                                    'id'=>$system->id,
                                    'route' => route('dashboard.systems.destroy',$system->id) ,
                                    'tooltip' => __('Delete'),
                                     ])
                    @endcomponent
            </div>

        </div>

    </td>
</tr>

