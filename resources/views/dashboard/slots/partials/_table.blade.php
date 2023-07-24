<table class="table table-striped dataex-html5-selectors">
    <thead>
    <tr>
        <th scope="col">{{__('#') }}</th>
        <th scope="col">{{__('main.start_at')}}</th>
        <th scope="col">{{__('main.end_at')}}</th>
        <th scope="col">{{__('main.options')}}</th>
    </thead>
    <tbody>
    @foreach($slots as $slot)
        @include('dashboard.slots.partials._table_raw')
    @endforeach
    </tbody>
    <tfoot>

    </tfoot>
</table>

