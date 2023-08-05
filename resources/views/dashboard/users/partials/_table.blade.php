<table class="table table-striped dataex-html5-selectors">
    <thead>
        <tr>
            <th scope="col">{{__('#') }}</th>
            <th scope="col">{{__('main.full_name')}}</th>
            <th scope="col">{{__('main.email')}}</th>
            <th scope="col">{{__('main.status')}}</th>
            <th scope="col">{{__('main.role')}}</th>
            <th scope="col">{{__('main.options')}}</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        @include('dashboard.users.partials._table_raw')
    @endforeach
    </tbody>
</table>

