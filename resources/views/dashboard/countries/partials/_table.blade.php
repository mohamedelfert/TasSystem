<table class="table table-striped dataex-html5-selectors">
    <thead>
        <tr>
            <th scope="col">{{__('#') }}</th>
            <th scope="col">{{__('main.country')}}</th>
            <th scope="col">{{__('main.code')}}</th>
            <th scope="col">{{__('main.symbol')}}</th>
            <th scope="col">{{__('main.status')}}</th>
            <th scope="col">{{__('main.options')}}</th>
        </tr>
    </thead>
    <tbody>
    @foreach($countries as $country)
        @include('dashboard.countries.partials._table_raw')
    @endforeach
    </tbody>
</table>

