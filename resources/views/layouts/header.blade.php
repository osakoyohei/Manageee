<nav class="navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('home') }}">ToDoList</a>
    @if(Auth::check())
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a href="{{ route('todo.index') }}" class="btn btn-link" style="color:white;">ToDoリスト <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a href="{{ route('todo.create') }}" class="btn btn-link" style="color:white;">ToDo登録 <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <div class="btn-group">
            <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ユーザー情報
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('user.profile') }}">プロフィール</a>
                <a class="dropdown-item" href="{{ route('user.account') }}">アカウント設定</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="dropdown-item" style="color:gray;">ログアウト</button>
                </form>
            </div>
        </div>
    @else
        <a href="{{ route('login.show') }}" class="btn btn-link" style="color:white;">ログイン</a>
        <a href="{{ route('register.show') }}" class="btn btn-link" style="color:white;">新規登録</a>
        <a href="{{ route('login.guest') }}" class="btn btn-link" style="color:white;">ゲストログイン</a>
    @endif
</nav>