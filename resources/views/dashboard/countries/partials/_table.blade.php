<table class="table table-striped dataex-html5-selectors">
    <thead>
    <tr>
        <th scope="col">{{__('#') }}</th>
        <th scope="col">{{__('Country Name')}}</th>
        <th scope="col">{{__('Options')}}</th>
    </thead>
    <tbody>
    @foreach($countries as $country)
        @include('dashboard.countries.partials._table_raw')
    @endforeach
    </tbody>
    <tfoot>

    </tfoot>
</table>

