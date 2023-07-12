<table class="table table-striped dataex-html5-selectors">
    <thead>
    <tr>
        <th scope="col">{{__('#') }}</th>
        <th scope="col">{{__('Payment Method')}}</th>
        <th scope="col">{{__('Options')}}</th>
    </thead>
    <tbody>
    @foreach($paymentMethods as $method)
        @include('dashboard.payment-methods.partials._table_raw')
    @endforeach
    </tbody>
    <tfoot>

    </tfoot>
</table>

