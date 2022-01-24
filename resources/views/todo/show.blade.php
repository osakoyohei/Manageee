@extends('layouts.layout')
@section('title', 'ToDo詳細')
@push('css')
    @if(app('env')=='local')
        <link href="{{ asset('/css/todo-show.css') }}" rel="stylesheet">
    @endif
    @if(app('env')=='production')
        <link href="{{ secure_asset('/css/todo-show.css') }}" rel="stylesheet">
    @endif
@endpush

@section('content')
<div class="detail">
    <h2>ToDo詳細</h2>

    <form method="POST" action="{{ route('todo.done', $todo->id) }}" onSubmit="return checkDone()">
        @csrf
        <button type="submit" class="done-button">完了</button>
    </form>

    <button type="button" class="edit-button" onclick="location.href='/todo/edit/{{ $todo->id }}'">編集</button>

    <form method="POST" action="{{ route('todo.delete', $todo->id) }}" onSubmit="return checkDelete()">
        @csrf
        <button type="submit" class="delete-button">削除</button>
    </form>
    
    <h6 class="detail-title">やること</h6>
    <h5>{{ $todo->title }}</h5>

    <h6 class="detail-title">内容</h6>
    <h5>{{ $todo->content }}</h5>

    <h6 class="detail-title">タグ</h6>
    @if ($todo->tags->isEmpty())
        <h5>タグはありません。</h5>
    @else
        @foreach ($todo->tags as $tag)
            <h5>#{{ $tag->tag_name }}</h5>
        @endforeach
    @endif

    <h6 class="detail-title">カテゴリー</h6>
    <h5>{{ $todo->category->category_name }}</h5>

    <h6 class="detail-title">登録日</h6>
    <h5>{{ $todo->created_at->format('Y/m/d') }}</h5>

    <h6 class="detail-title">経過日数</h6>
    <h5>{{ $today->diffInDays($todo->created_at) }}</h5>

</div>
<script>
function checkDone(){
    if(window.confirm('ToDoを完了してよろしいですか？')){
        return true;
    } else {
        return false;
    }
}

function checkDelete(){
    if(window.confirm('ToDoを削除してよろしいですか？')){
        return true;
    } else {
        return false;
    }
}
</script>
@endsection
