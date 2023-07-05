<tr>
    <td>{!! $loop->index +1 !!}</td>
    <td>{!! $country->name !!}</td>
    <td>

        <div class="btn-group" role="group" aria-label="Vertical button group">
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._edit_button',[
                        'route' => route('dashboard.countries.edit',$country->id),
                        'tooltip' => __('Edit '.$country['name']),
                         ])
                @endcomponent
            </div>
                <div class="btn-group" role="group">
                    @component('dashboard.layouts.partials.buttons._delete_button',[
                                    'id'=>$country->id,
                                    'route' => route('dashboard.countries.destroy',$country->id) ,
                                    'tooltip' => __('Delete'),
                                     ])
                    @endcomponent
            </div>

        </div>

    </td>
</tr>

