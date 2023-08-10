<tr>
    <td>{!! $loop->index +1 !!}</td>
    <td>{{ setting()->total ?? '-' }}</td>
    <td>{{ Carbon\Carbon::parse($slot->start)->format('g:i A') ?? '-' }}</td>
    <td>{{ Carbon\Carbon::parse($slot->end)->format('g:i A') ?? '-' }}</td>
    <td>{{ $slot->number ?? '-' }}</td>
    <td>
        @if(request()->has('view_deleted'))
            <a href="{{ route('admin.restoreSlotValidation', $slot->id) }}" class="btn btn-success">{{ __('main.restore') }}</a>
        @else
            <div class="btn-group" role="group" aria-label="Vertical button group">
                @can('slot-validation-edit')
                    <div class="btn-group" role="group">
                        @component('dashboard.layouts.partials.buttons._edit_button',[
                                'route' => route('admin.slots-validation.edit',$slot->id),
                                'tooltip' => __('main.edit'),
                                 ])
                        @endcomponent
                    </div>
                @endcan

                @can('slot-validation-delete')
                    <div class="btn-group" role="group">
                        @component('dashboard.layouts.partials.buttons._delete_button',[
                                    'id'=>$slot->id,
                                    'route' => route('admin.slots-validation.destroy',$slot->id) ,
                                    'tooltip' => __('main.delete'),
                                     ])
                        @endcomponent
                    </div>
                @endcan
            </div>
        @endif
    </td>
</tr>

