<table class="table table-striped dataex-html5-selectors">
    <thead>
    <tr>
        <th scope="col">{{__('#') }}</th>
        <th scope="col">{{__('Slot Name')}}</th>
        <th scope="col">{{__('Start At')}}</th>
        <th scope="col">{{__('End At')}}</th>
        <th scope="col">{{__('Options')}}</th>
    </thead>
    <tbody>
    @foreach($slots as $slot)
        @include('dashboard.slots.partials._table_raw')
    @endforeach
    </tbody>
    <tfoot>

    </tfoot>
</table>

