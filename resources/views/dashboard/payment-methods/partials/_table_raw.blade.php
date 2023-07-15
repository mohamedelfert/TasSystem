<tr>
    <td>{!! $loop->index +1 !!}</td>
    <td>{!! $method->name !!}</td>
    <td>

        <div class="btn-group" role="group" aria-label="Vertical button group">

            @can('payment-method-edit')
                <div class="btn-group" role="group">
                    @component('dashboard.layouts.partials.buttons._edit_button',[
                            'route' => route('admin.payment-methods.edit',$method->id),
                            'tooltip' => __('Edit '.$method['name']),
                             ])
                    @endcomponent
                </div>
            @endcan

            @can('payment-method-delete')
                <div class="btn-group" role="group">
                    @component('dashboard.layouts.partials.buttons._delete_button',[
                                'id'=>$method->id,
                                'route' => route('admin.payment-methods.destroy',$method->id) ,
                                'tooltip' => __('Delete'),
                                 ])
                    @endcomponent
                </div>
            @endcan

        </div>
    </td>
</tr>

