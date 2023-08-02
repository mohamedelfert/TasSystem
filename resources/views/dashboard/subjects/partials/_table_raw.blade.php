<tr>
    <td>{!! $loop->index +1 !!}</td>
    <td>{!! session('lang') == 'ar' ? $subject->getTranslation('name', 'ar') : $subject->getTranslation('name', 'en') !!}</td>
    <td>{!! $subject->system->name !!}</td>
    <td>
        @if(request()->has('view_deleted'))
            <a href="{{ route('admin.restoreSubject', $subject->id) }}" class="btn btn-success">{{ __('main.restore') }}</a>
        @else
            <div class="btn-group" role="group" aria-label="Vertical button group">
                @can('subject-show')
                    <div class="btn-group" role="group">
                        @component('dashboard.layouts.partials.buttons._show_button',[
                                    'route' => route('admin.subjects.show',$subject->id),
                                    'tooltip' => __('main.show'),
                                     ])
                        @endcomponent
                    </div>
                @endcan

                @can('subject-edit')
                    <div class="btn-group" role="group">
                        @component('dashboard.layouts.partials.buttons._edit_button',[
                                    'route' => route('admin.subjects.edit',$subject->id),
                                    'tooltip' => __('main.edit'),
                                     ])
                        @endcomponent
                    </div>
                @endcan

                @can('subject-delete')
                    <div class="btn-group" role="group">
                        @component('dashboard.layouts.partials.buttons._delete_button',[
                                    'id'=>$subject->id,
                                    'route' => route('admin.subjects.destroy',$subject->id) ,
                                    'tooltip' => __('main.delete'),
                                     ])
                        @endcomponent
                    </div>
                @endcan
            </div>
        @endif
    </td>
</tr>

