<tr>
    <td>{!! $loop->index +1 !!}</td>
    <td>{!! $teacher->first_name .' '. $teacher->last_name !!}</td>
    <td>{!! $teacher->phone !!}</td>
    <td>{!! $teacher->email !!}</td>
    <td>{!! $teacher->address !!}</td>
    <td>
        @if($teacher->status === 'active')
            <span class="badge badge-pill badge-success">{{ $teacher->status }}</span>
        @elseif($teacher->status === 'inactive')
            <span class="badge badge-pill badge-danger">{{ $teacher->status }}</span>
        @endif
    </td>
    <td>

        <div class="btn-group" role="group" aria-label="Vertical button group">
            <div class="btn-group" role="group">
                @component('dashboard.layouts.partials.buttons._show_button',[
                            'route' => route('admin.teachers.show',$teacher->id),
                            'tooltip' => __('Show '.$teacher['name']),
                             ])
                @endcomponent
            </div>
            <div class="btn-group" role="group">
            @component('dashboard.layouts.partials.buttons._edit_button',[
                        'route' => route('admin.teachers.edit',$teacher->id),
                        'tooltip' => __('Edit '.$teacher['name']),
                         ])
                @endcomponent
            </div>
                <div class="btn-group" role="group">
                    @component('dashboard.layouts.partials.buttons._delete_button',[
                                    'id'=>$teacher->id,
                                    'route' => route('admin.teachers.destroy',$teacher->id) ,
                                    'tooltip' => __('Delete'),
                                     ])
                    @endcomponent
            </div>

        </div>

    </td>
</tr>

