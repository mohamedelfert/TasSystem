<table class="table table-striped dataex-html5-selectors">
    <thead>
        <tr>
            <th scope="col">{{__('#') }}</th>
            <th scope="col">{{__('main.total')}}</th>
            <th scope="col">{{__('main.start')}}</th>
            <th scope="col">{{__('main.end')}}</th>
            <th scope="col">{{__('main.number')}}</th>
            <th scope="col">{{__('main.options')}}</th>
        </tr>
    </thead>
    <tbody>
    @foreach($slots as $slot)
        @include('dashboard.slots-validation.partials._table_raw')
    @endforeach
    </tbody>
</table>

