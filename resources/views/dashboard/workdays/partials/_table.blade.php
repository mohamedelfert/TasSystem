<table class="table table-striped dataex-html5-selectors">
    <thead>
    <tr>
        <th scope="col">{{__('#') }}</th>
        <th scope="col">{{__('main.workday')}}</th>
    </thead>
    <tbody>
        @foreach($workdays as $workday)
            @include('dashboard.workdays.partials._table_raw')
        @endforeach
    </tbody>
    <tfoot>

    </tfoot>
</table>

