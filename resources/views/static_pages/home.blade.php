@extends('layouts.default')
@section('title', '主页')
@section('content')
    <div class="jumbotron">

        <h1>hello laravel</h1>
        <p class="lead">laravel项目主页</p>
        <p>一切从这里开始</p>
        <p>
            <a class="btn btn-lg btn-success" href="{{route('signup')}}">现在注册</a>

        @each('shared._item', [],'item', 'shared._emptyItem')
        <p>自定义指令</p><p>{{$time}}</p>
        @todate($time)
    </div>
@endsection
