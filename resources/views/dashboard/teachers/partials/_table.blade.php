<table class="table table-striped dataex-html5-selectors">
    <thead>
    <tr>
        <th scope="col">{{__('#') }}</th>
        <th scope="col">{{__('Full Name')}}</th>
        <th scope="col">{{__('phone')}}</th>
        <th scope="col">{{__('email')}}</th>
        <th scope="col">{{__('address')}}</th>
        <th scope="col">{{__('status')}}</th>
        <th scope="col">{{__('Options')}}</th>
    </thead>
    <tbody>
    @foreach($teachers as $teacher)
        @include('dashboard.teachers.partials._table_raw')
    @endforeach
    </tbody>
    <tfoot>

    </tfoot>
</table>

