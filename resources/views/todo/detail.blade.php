@extends('layout')
@section('title', 'ToDo詳細')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>{{ $todo->title }}</h2>
        <p>登録日：{{ $todo->created_at }}</p>
        <h4>{{ $todo->content }}</h4>
    </div>
</div>
@endsection
