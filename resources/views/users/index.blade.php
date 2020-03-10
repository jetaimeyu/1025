@extends('layouts.default')
@section('title', '用户列表')
@section('content')
    <div class="offset-md-2 col-md-8">
        <h2 class="mb-4 text-center">用户列表</h2>
        <div class="list-group list-group-flush">
            @foreach($users as $user)
                @include('users._user')
{{--                <img src="{{$user->gravatar()}}" alt="{{$user->name}}" class="mr-3" width="32">--}}
{{--                <a href="{{route('users.show', $user)}}">--}}
{{--                    {{$user->name}}--}}
{{--                </a>--}}
            @endforeach
        </div>
        <div class="mt-3">
            {!!$users->render()!!}
{{--            {!! $users->render() !!}--}}
        </div>
    </div>
@endsection
