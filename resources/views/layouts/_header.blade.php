@auth
    <form action="{{ route('logout') }}" method="post">
        {{ csrf_field() }}
        <button class="btn btn-danger">退出</button>
    </form>
@else
    <a href="{{ route('login') }}" class="btn btn-success">登陆</a>
@endauth