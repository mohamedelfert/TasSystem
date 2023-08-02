
@if(isset($id))
    <a href="{{route('teacher.'.$route.'.create',['id'=>$id])}}" class="btn-icon btn btn-success btn-round btn-sm" ><i class="feather icon-plus"></i> {{__('main.add_new')}}</a>
@else
    <a href="{{route('teacher.'.$route.'.create')}}" class="btn-icon btn btn-success btn-round btn-sm" ><i class="feather icon-plus"></i> {{__('main.add_new')}}</a>
@endif
<div class="dropdown-menu dropdown-menu-right">
    <a class="dropdown-item" href="#">Chat</a>
    <a class="dropdown-item" href="#">Email</a>
    <a class="dropdown-item" href="#">Calendar</a>
</div>
