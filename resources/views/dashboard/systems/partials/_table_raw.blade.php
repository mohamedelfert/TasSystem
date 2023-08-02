<tr>
    <td>{!! $loop->index +1 !!}</td>
    <td>{!! session('lang') == 'ar' ? $system->getTranslation('name', 'ar') : $system->getTranslation('name', 'en') !!}</td>
    <td>
        @if(request()->has('view_deleted'))
            <a href="{{ route('admin.restoreSystem', $system->id) }}" class="btn btn-success">{{ __('main.restore') }}</a>
        @else
            <div class="btn-group" role="group" aria-label="Vertical button group">
                @can('system-edit')
                    <div class="btn-group" role="group">
                        @component('dashboard.layouts.partials.buttons._edit_button',[
                                'route' => route('admin.systems.edit',$system->id),
                                'tooltip' => __('main.edit'),
                                 ])
                        @endcomponent
                    </div>
                @endcan

                @can('system-delete')
                    <div class="btn-group" role="group">
                        @component('dashboard.layouts.partials.buttons._delete_button',[
                                    'id'=>$system->id,
                                    'route' => route('admin.systems.destroy',$system->id) ,
                                    'tooltip' => __('main.delete'),
                                     ])
                        @endcomponent
                    </div>
                @endcan
            </div>
        @endif
    </td>
</tr>

