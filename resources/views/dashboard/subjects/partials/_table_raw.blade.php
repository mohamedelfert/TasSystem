<tr>
    <td>{!! $loop->index +1 !!}</td>
    <td>{!! $subject->name !!}</td>
    <td>{!! $subject->price !!} $</td>
    <td>{!! $subject->system->name !!}</td>
    <td>

        <div class="btn-group" role="group" aria-label="Vertical button group">

            @can('subject-show')
                <div class="btn-group" role="group">
                    @component('dashboard.layouts.partials.buttons._show_button',[
                                'route' => route('admin.subjects.show',$subject->id),
                                'tooltip' => __('Edit '.$subject['name']),
                                 ])
                    @endcomponent
                </div>
            @endcan

            @can('subject-edit')
                <div class="btn-group" role="group">
                    @component('dashboard.layouts.partials.buttons._edit_button',[
                                'route' => route('admin.subjects.edit',$subject->id),
                                'tooltip' => __('Edit '.$subject['name']),
                                 ])
                    @endcomponent
                </div>
            @endcan

            @can('subject-delete')
                <div class="btn-group" role="group">
                    @component('dashboard.layouts.partials.buttons._delete_button',[
                                'id'=>$subject->id,
                                'route' => route('admin.subjects.destroy',$subject->id) ,
                                'tooltip' => __('Delete'),
                                 ])
                    @endcomponent
                </div>
            @endcan

        </div>
    </td>
</tr>

