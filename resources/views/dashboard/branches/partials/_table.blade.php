<table class="table table-striped dataex-html5-selectors">
    <thead>
    <tr>
        <th scope="col">{{__('#') }}</th>
        <th scope="col">{{__('main.name')}}</th>
        <th scope="col">{{__('main.phone')}}</th>
        <th scope="col">{{__('main.email')}}</th>
        <th scope="col">{{__('main.status')}}</th>
        <th scope="col">{{__('main.options')}}</th>
    </thead>
    <tbody>
    @foreach($branches as $branch)
        @include('dashboard.branches.partials._table_raw')
    @endforeach
    </tbody>
    <tfoot>

    </tfoot>
</table>

