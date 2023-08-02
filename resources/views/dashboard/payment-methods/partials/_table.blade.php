<table class="table table-striped dataex-html5-selectors">
    <thead>
        <tr>
            <th scope="col">{{__('#') }}</th>
            <th scope="col">{{__('main.payment_method')}}</th>
            <th scope="col">{{__('main.options')}}</th>
        </tr>
    </thead>
    <tbody>
    @foreach($paymentMethods as $paymentMethod)
        @include('dashboard.payment-methods.partials._table_raw')
    @endforeach
    </tbody>
</table>

