<table class="table table-striped dataex-html5-selectors">
    <thead>
        <tr>
            <th scope="col">{{__('#') }}</th>
            <th scope="col">{{__('Role name')}}</th>
            <th scope="col">{{__('Display Name')}}</th>
            <th scope="col">{{__('Options')}}</th>
        </tr>
    </thead>
    <tbody>
    @foreach($roles as $role)
        @include('dashboard.roles.partials._table_raw')
    @endforeach
    </tbody>
</table>

