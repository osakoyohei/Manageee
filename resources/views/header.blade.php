<nav class="navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('todos') }}">ToDoリスト</a>
        @if(Auth::check())
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="btn btn-link" style="color:white;" href="{{ route('create') }}">ToDo追加 <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-link" style="color:silver;">ログアウト</button>
            </form>
        @else
            <a class="btn btn-link" style="color:white;" href="{{ route('login.show') }}">ログイン</a>
            <a class="btn btn-link" style="color:white;" href="{{ route('register.show') }}">新規登録</a>
        @endif
    </div>
</nav>