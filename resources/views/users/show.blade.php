@extends('layouts.app')

@section('title', $user->name . '的个人页面')

@section('content')
    用户名：{{ $user->name }}
    邮箱：{{ $user->email }}
    <form action="{{ route('users.destroy', $user) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('delete') }}
        <button class="btn btn-danger">我删我自己</button>
    </form>
@endsection