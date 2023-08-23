<tr>
    <td>{!! $loop->index +1 !!}</td>
    <td>{!! (app()->getLocale() == 'ar') ? $fine->getTranslation('name', 'ar') : $fineType->getTranslation('name', 'en') !!}</td>
    <td>
        @if($fineType->type === 'edit')
            <span class="badge badge-pill badge-light-warning">
                {!! $fineType->type !!}
                <i class="fa fa-edit"></i>
            </span>
        @elseif($fineType->type === 'cancel')
            <span class="badge badge-pill badge-light-danger">
                {!! $fineType->type !!}
                <i class="fa fa-close"></i>
            </span>
        @else
            <span class="badge badge-pill badge-danger">
                {!! $fineType->type !!}
                <i class="fa fa-trash"></i>
            </span>
        @endif
    </td>
    <td>{!! $fineType->price !!} $</td>
    <td>
        <div class="btn-group" role="group" aria-label="Vertical button group">
            @can('country-edit')
                <div class="btn-group" role="group">
                    @component('dashboard.layouts.partials.buttons._edit_button',[
                            'route' => route('admin.fine-types.edit',$fineType->id),
                            'tooltip' => __('main.edit'),
                             ])
                    @endcomponent
                </div>
            @endcan
        </div>
    </td>
</tr>

