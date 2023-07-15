<table class="table table-striped dataex-html5-selectors">
    <thead>
    <tr>
        <th scope="col">{{__('#') }}</th>
        <th scope="col">{{__('Subject Name')}}</th>
        <th scope="col">{{__('Price')}}</th>
        <th scope="col">{{__('System')}}</th>
        <th scope="col">{{__('Options')}}</th>
    </thead>
    <tbody>
    @foreach($subjects as $subject)
        @include('dashboard.subjects.partials._table_raw')
    @endforeach
    </tbody>
    <tfoot>

    </tfoot>
</table>

