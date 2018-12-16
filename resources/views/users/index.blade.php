@extends('layouts.app')

@section('title', '所有用户')

@section('content')
    @foreach($users as $user)
        <div>
            <a href="{{ route('users.show', [$user]) }}">{{ $user->name }}</a><br>
            {{ $user->email }}
        </div>
    @endforeach
@endsection