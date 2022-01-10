@extends('layouts.layout')
@section('title', 'ToDo完了履歴詳細')
@push('css')
    @if(app('env')=='local')
        <link href="{{ asset('/css/user-information/todo-history-show.css') }}" rel="stylesheet">
    @endif
    @if(app('env')=='production')
        <link href="{{ secure_asset('/css/user-information/todo-history-show.css') }}" rel="stylesheet">
    @endif
@endpush

@section('content')

<div class="todo-history">

    <h2>ToDo完了履歴詳細</h2>

    <h6 class="detail-title">やること</h6>
    <h5>{{ $todoHistory->title }}</h5>

    <h6 class="detail-title">内容</h6>
    <h5>{{ $todoHistory->content }}</h5>

    <h6 class="detail-title">カテゴリー</h6>
    <h5>{{ $todoHistory->category->name }}</h5>

    <h6 class="detail-title">登録日</h6>
    <h5>{{ $todoHistory->todo_created_at->format('Y/m/d') }}</h5>

    <h6 class="detail-title">完了日</h6>
    <h5>{{ $todoHistory->created_at->format('Y/m/d') }}</h5>

    <h6 class="detail-title">登録から完了までの日数</h6>
    <h5>{{ $todoHistory->todo_created_at->diffInDays($todoHistory->created_at) }}日</h5>

</div>


@endsection