@extends('layouts.layout')
@section('title', 'ToDo詳細')
@push('css')
    @if(app('env')=='local')
        <link href="{{ asset('/css/todo/detail.css') }}" rel="stylesheet">
    @endif
    @if(app('env')=='production')
        <link href="{{ secure_asset('/css/todo/detail.css') }}" rel="stylesheet">
    @endif
@endpush

@section('content')
<div class="detail">
    <h2 class="title">ToDo詳細</h2>
    <form method="POST" action="{{ route('todo.delete', $todo->id) }}" onSubmit="return checkDelete()">
    @csrf
        <button type="submit" class="delete-button">削除</button>
    </form>

    <h6 class="detail-title">やること</h6>
    <h5>{{ $todo->title }}</h5>

    <h6 class="detail-title">内容</h6>
    <h5>{{ $todo->content }}</h5>
  
</div>
<script>
function checkDelete(){
    if(window.confirm('ToDoを削除してよろしいですか？')){
        return true;
    } else {
        return false;
    }
}
</script>
@endsection
