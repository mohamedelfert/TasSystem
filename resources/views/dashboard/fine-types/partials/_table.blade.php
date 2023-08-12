<table class="table table-striped dataex-html5-selectors">
    <thead>
        <tr>
            <th scope="col">{{__('#') }}</th>
            <th scope="col">{{__('main.name')}}</th>
            <th scope="col">{{__('main.type')}}</th>
            <th scope="col">{{__('main.price')}}</th>
            <th scope="col">{{__('main.options')}}</th>
        </tr>
    </thead>
    <tbody>
    @foreach($fineTypes as $fineType)
        @include('dashboard.fine-types.partials._table_raw')
    @endforeach
    </tbody>
</table>

