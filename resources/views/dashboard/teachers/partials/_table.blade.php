<table class="table table-striped dataex-html5-selectors">
    <thead>
        <tr>
            <th scope="col">{{__('#') }}</th>
            <th scope="col">{{__('main.full_name')}}</th>
            <th scope="col">{{__('main.phone')}}</th>
            <th scope="col">{{__('main.email')}}</th>
            <th scope="col">{{__('main.address')}}</th>
            <th scope="col">{{__('main.status')}}</th>
            <th scope="col">{{__('main.options')}}</th>
        </tr>
    </thead>
    <tbody>
    @foreach($teachers as $teacher)
        @include('dashboard.teachers.partials._table_raw')
    @endforeach
    </tbody>
</table>

