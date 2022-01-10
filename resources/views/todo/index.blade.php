@extends('layouts.layout')
@section('title', 'ToDoリスト')
@push('css')
    @if(app('env')=='local')
        <link href="{{ asset('/css/todo-index.css') }}" rel="stylesheet">
    @endif
    @if(app('env')=='production')
        <link href="{{ secure_asset('/css/todo-index.css') }}" rel="stylesheet">
    @endif
@endpush

@section('content')
<div class="list">

    @if (session('status'))
        <div class="alert alert-primary" role="alert">
            {{ session('status') }}
        </div>
    @endif
    
    <x-alert type="success" :session="session('success')"/>
    <x-alert type="primary" :session="session('primary')"/>
    <x-alert type="danger" :session="session('danger')"/>

    <h2>{{ Auth::user()->name }}<small>さんの</small>ToDoリスト</h2><br>

    <!-- やることキーワード検索 -->
    <div class="post-search-form">
        <form class="form-inline" action="{{ route('title.search') }}" method="GET">
            <div class="form-group">
                <label for="keyword" class="mr-4">やること検索　</label>
                <input type="text" name="keyword" class="form-control mr-1" id="keyword" placeholder="キーワードを入力" value="@if(isset($keyword)){{ $keyword }}@endif">
            </div>
            <input type="submit" value="検索" class="btn btn-secondary">
        </form>
    </div>
    <br>

    <!-- カテゴリー検索 -->
    <div class="post-search-form">
        <form class="form-inline" action="{{ route('category.search') }}" method="GET">
            <div class="form-group">
                <label for="category" class="mr-4">カテゴリー検索</label>
                <select name="category" class="form-control mr-1" id="category">
                    <option value="">カテゴリーで検索 　　</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            @if($category->id == $categoryId) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="検索" class="btn btn-secondary">
        </form>
    </div>
    <br>

    @if(empty($todos[0]['user_id']))
        <h5>ToDoが登録されていません。</h5>
    @else
        <table class="table table-striped">
            <tr>
                <th class="col-2">やること</th>
                <th class="col-auto">登録日 @sortablelink('created_at', '')</th>
                <th class="col-auto">経過日数</th>
                <th class="col-2">カテゴリー</th>
                <th class="col-1">詳細</th>
                <th class="col-1">編集</th>
                <th class="col-1">完了</th>
            </tr>
            @foreach($todos as $todo)
            <tr>
                <td>{{Str::limit($todo->title, 10, '…' )}}</td>
                <td>{{ $todo->created_at->format('Y/m/d') }}</td>
                <td>{{ $today->diffInDays($todo->created_at) }}日</td>
                <td>{{ $todo->category->name }}</td>
                <td><button type="button" class="list-button" onclick="location.href='/todo/{{ $todo->id }}'"><i class="far fa-list-alt"></i></button></td>
                <td><button type="button" class="edit-button" onclick="location.href='/todo/edit/{{ $todo->id }}'"><i class="fas fa-edit"></i></button></td>
                <form method="POST" action="{{ route('todo.done', $todo->id) }}" onSubmit="return checkDelete()">
                @csrf
                    <td><button type="submit" class="delete-button"><i class="fas fa-check"></i></button></td>
                </form>
            </tr>
            @endforeach
        </table>
        {{ $todos->appends(request()->query())->links() }}
    @endif
</div>
<script>
function checkDelete(){
    if(window.confirm('ToDoを完了してよろしいですか？')){
        return true;
    } else {
        return false;
    }
}
</script>
@endsection
