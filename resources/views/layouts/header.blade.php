<nav class="navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('index') }}">Manageee</a>
        @if(Auth::check())
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="btn btn-link" style="color:white;" href="{{ route('todos') }}">ToDoリスト <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="btn btn-link" style="color:white;" href="{{ route('create') }}">ToDo登録 <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-link" style="color:silver;">ログアウト</button>
            </form>
        @else
            <a class="btn btn-link" style="color:white;" href="{{ route('login.show') }}">ログイン</a>
            <a class="btn btn-link" style="color:white;" href="{{ route('register.show') }}">新規登録</a>
            <a class="btn btn-link" style="color:white;" href="{{ route('login.guest') }}">ゲストログイン</a>
        @endif
</nav>