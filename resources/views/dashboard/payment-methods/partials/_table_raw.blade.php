<tr>
    <td>{!! $loop->index +1 !!}</td>
    <td>{!! session('lang') == 'ar' ? $paymentMethod->getTranslation('name', 'ar') : $paymentMethod->getTranslation('name', 'en') !!}</td>
    <td>

        <div class="btn-group" role="group" aria-label="Vertical button group">

            @can('payment-method-edit')
                <div class="btn-group" role="group">
                    @component('dashboard.layouts.partials.buttons._edit_button',[
                            'route' => route('admin.payment-methods.edit',$paymentMethod->id),
                            'tooltip' => __('main.edit'),
                             ])
                    @endcomponent
                </div>
            @endcan

            @can('payment-method-delete')
                <div class="btn-group" role="group">
                    @component('dashboard.layouts.partials.buttons._delete_button',[
                                'id'=>$paymentMethod->id,
                                'route' => route('admin.payment-methods.destroy',$paymentMethod->id) ,
                                'tooltip' => __('main.delete'),
                                 ])
                    @endcomponent
                </div>
            @endcan

        </div>
    </td>
</tr>

