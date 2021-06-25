<nav class="navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('index') }}">ToDoList</a>
        @if(Auth::check())
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a href="{{ route('todos') }}" class="btn btn-link" style="color:white;">ToDoリスト <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a href="{{ route('create') }}" class="btn btn-link" style="color:white;">ToDo登録 <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-link" style="color:silver;">ログアウト</button>
            </form>
        @else
            <a href="{{ route('login.show') }}" class="btn btn-link" style="color:white;">ログイン</a>
            <a href="{{ route('register.show') }}" class="btn btn-link" style="color:white;">新規登録</a>
            <a href="{{ route('login.guest') }}" class="btn btn-link" style="color:white;">ゲストログイン</a>
        @endif
</nav>