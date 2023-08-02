<tr>
    <td>{!! $loop->index +1 !!}</td>
    <td>{!! session('lang') == 'ar' ? $branch->getTranslation('name', 'ar') : $branch->getTranslation('name', 'en') !!}</td>
    <td>{!! $branch->phone !!}</td>
    <td>{!! $branch->email !!}</td>
    <td>
        @if($branch->status === 'open')
            <span class="badge badge-pill badge-success">{{ $branch->status }}</span>
        @elseif($branch->status === 'close')
            <span class="badge badge-pill badge-danger">{{ $branch->status }}</span>
        @endif
    </td>
    <td>
        @if(request()->has('view_deleted'))
            <a href="{{ route('admin.restoreBranch', $branch->id) }}" class="btn btn-success">{{ __('main.restore') }}</a>
        @else
            <div class="btn-group" role="group" aria-label="Vertical button group">
                @can('branch-show')
                    <div class="btn-group" role="group">
                        @component('dashboard.layouts.partials.buttons._show_button',[
                                    'route' => route('admin.branches.show',$branch->id),
                                    'tooltip' => __('main.show'),
                                     ])
                        @endcomponent
                    </div>
                @endcan

                @can('branch-edit')
                    <div class="btn-group" role="group">
                        @component('dashboard.layouts.partials.buttons._edit_button',[
                                    'route' => route('admin.branches.edit',$branch->id),
                                    'tooltip' => __('main.edit'),
                                     ])
                        @endcomponent
                    </div>
                @endcan

                @can('branch-delete')
                    <div class="btn-group" role="group">
                        @component('dashboard.layouts.partials.buttons._delete_button',[
                                    'id'=>$branch->id,
                                    'route' => route('admin.branches.destroy',$branch->id) ,
                                    'tooltip' => __('main.delete'),
                                     ])
                        @endcomponent
                    </div>
                @endcan
            </div>
        @endif
    </td>
</tr>

