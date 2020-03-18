@extends('layouts.default')
@section('title', '主页')
@section('content')
    <div class="text-success">1212</div>
    <div class="jumbotron">

        <h1>hello laravel</h1>
        <p class="lead">laravel项目主页</p>
        <p>一切从这里开始</p>
        <p>
            <a class="btn btn-lg btn-success" href="{{route('signup')}}">现在注册</a>

        @each('shared._item', [],'item', 'shared._emptyItem')
        <p>自定义指令</p>
        <p>{{$time}}</p>
        @todate($time)
    </div>
    <div class="card">
        <div class="card-header">
            <h5>上传测试</h5>
        </div>
        @include('shared._errors')
        <div class="card-body">
            <form action="{{route('uploadTest')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="imgt">图片</label>
                    <input type="file" id="imgt" name="imgt" class="form-control-file">
                </div>

                <button type="submit" class="btn-primary btn">提交</button>
            </form>
        </div>

    </div>
@endsection
