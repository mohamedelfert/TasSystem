<table class="table table-striped dataex-html5-selectors">
    <thead>
    <tr>
        <th scope="col">{{__('#') }}</th>
        <th scope="col">{{__('main.system')}}</th>
        <th scope="col">{{__('main.options')}}</th>
    </thead>
    <tbody>
    @foreach($systems as $system)
        @include('dashboard.systems.partials._table_raw')
    @endforeach
    </tbody>
    <tfoot>

    </tfoot>
</table>

