<table class="table table-striped dataex-html5-selectors">
    <thead>
        <tr>
            <th scope="col">{{__('#') }}</th>
            <th scope="col">{{__('main.role_name')}}</th>
            <th scope="col">{{__('main.display_name')}}</th>
            <th scope="col">{{__('main.options')}}</th>
        </tr>
    </thead>
    <tbody>
    @foreach($roles as $role)
        @include('dashboard.roles.partials._table_raw')
    @endforeach
    </tbody>
</table>

