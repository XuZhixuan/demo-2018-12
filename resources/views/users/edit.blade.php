@extends('layouts.app')

@section('title', '修改' . $user->name )

@section('content')
    <div class="panel-default">
        <!-- 这里应用了 Bootstrap 的样式 -->
        <div class="panel-heading">
            <h4>修改用户信息</h4>
        </div>
        <div class="panel-body">
            @include('shared._errors')
            <form action="{{ route('users.update', $user->id) }}" method="post">
                {{ csrf_field() }}
                {{--这里的 csrf 是为了通过后台的 CSRF 验证，这是一个用于防止跨域攻击的措施--}}
                {{ method_field('put') }}
                {{--因为是更新信息，需要通过 PUT 方法，而表单本身不支持这种方法，通过 method_field() 来模拟--}}
                <div class="form-group">
                    <label for="name">用户名：</label>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="email">邮箱：</label>
                    <input class="form-control" type="email" name="email" id="email" value="{{ $user->email }}" disabled>
                </div>
                <div class="form-group">
                    <label for="password">密码：</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">确认密码：</label>
                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
                    {{--使用 name 为 password_confirmation 以便于后端直接确认密码相同--}}
                </div>
                <button class="btn btn-primary">提交</button>
            </form>
        </div>
    </div>
@endsection