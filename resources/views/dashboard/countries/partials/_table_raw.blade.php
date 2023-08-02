<tr>
    <td>{!! $loop->index +1 !!}</td>
    <td>{!! session('lang') == 'ar' ? $country->getTranslation('name', 'ar') : $country->getTranslation('name', 'en') !!}</td>
    <td>{!! $country->code !!}</td>
    <td>{!! $country->status !!}</td>
    <td>
        @if(request()->has('view_deleted'))
            <a href="{{ route('admin.restoreCountry', $country->id) }}" class="btn btn-success">{{ __('main.restore') }}</a>
        @else
            <div class="btn-group" role="group" aria-label="Vertical button group">
                @can('country-edit')
                    <div class="btn-group" role="group">
                        @component('dashboard.layouts.partials.buttons._edit_button',[
                                'route' => route('admin.countries.edit',$country->id),
                                'tooltip' => __('main.edit'),
                                 ])
                        @endcomponent
                    </div>
                @endcan

                @can('country-delete')
                    <div class="btn-group" role="group">
                        @component('dashboard.layouts.partials.buttons._delete_button',[
                                    'id' => $country->id,
                                    'route' => route('admin.countries.destroy',$country->id) ,
                                    'tooltip' => __('main.delete'),
                                     ])
                        @endcomponent
                    </div>
                @endcan
            </div>
        @endif
    </td>
</tr>

