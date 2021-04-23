<nav class="navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('todos') }}">ToDoリスト</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="btn btn-link" style="color:white;" href="{{ route('create') }}">ToDo追加 <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-link" style="color:silver;">ログアウト</button>
        </form>
    </div>
</nav>