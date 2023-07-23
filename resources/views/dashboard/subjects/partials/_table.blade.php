<table class="table table-striped dataex-html5-selectors">
    <thead>
    <tr>
        <th scope="col">{{__('#') }}</th>
        <th scope="col">{{__('main.subject')}}</th>
        <th scope="col">{{__('main.system')}}</th>
        <th scope="col">{{__('main.options')}}</th>
    </thead>
    <tbody>
    @foreach($subjects as $subject)
        @include('dashboard.subjects.partials._table_raw')
    @endforeach
    </tbody>
    <tfoot>

    </tfoot>
</table>

