<tr>
    <td>{!! $loop->index +1 !!}</td>
    <td>{!! $workday->day !!}</td>
{{--    <td>{{ Carbon\Carbon::parse($workday->date)->toDateString() }}</td>--}}
    <td>{{ Carbon\Carbon::parse($workday->date)->toFormattedDateString() }}</td>
    <td>{{ $workday->slot->name }}</td>
    <td>

        <div class="btn-group" role="group" aria-label="Vertical button group">
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._edit_button',[
                        'route' => route('admin.workdays.edit',$workday->id),
                        'tooltip' => __('Edit '.$workday['name']),
                         ])
                @endcomponent
            </div>
                <div class="btn-group" role="group">
                    @component('dashboard.layouts.partials.buttons._delete_button',[
                                    'id'=>$workday->id,
                                    'route' => route('admin.workdays.destroy',$workday->id) ,
                                    'tooltip' => __('Delete'),
                                     ])
                    @endcomponent
            </div>

        </div>

    </td>
</tr>

