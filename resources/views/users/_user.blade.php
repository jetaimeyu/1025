<div class="list-group-item">
{{--    <img src="{{$user->gravatar()}}" alt="" class="mr-3" width="32">--}}
    <a href="{{route('users.show', $user)}}">{{$user->name}}</a>
    @can('destroy', $user)
        <form action="{{route('users.destroy', $user)}}" class="float-right" method="post">
{{--            {{csrf_field()}}--}}
            @csrf
            @method('delete')
{{--            {{method_field('delete')}}--}}
            <button type="submit" class="btn btn-danger btn-sm delete-btn">删除</button>
        </form>
    @endcan
</div>
