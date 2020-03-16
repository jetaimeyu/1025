@extends('layouts.default')
@section('title', '重置密码')
@section('content')
    <div class="offset-md-2 col-md-8">
        <div class="card">
            <div class="card-header"><h5>重置密码</h5></div>
            <div class="card-body">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                @endif
                <form method="post" action="{{route('password.email')}}">
                    @csrf
                    <div class="form-group{{$errors->has('email')? 'has-error':''}}">
                        <label for="email" class="form-control-label">邮箱地址：</label>
                        <input id="email" name="email" type="email" value="{{old('email')}}">

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
