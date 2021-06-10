@extends('layouts.layout')
@section('title', 'ToDo詳細')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h3>{{ $todo->title }}</h3>
        <span>登録日：{{ $todo->created_at }}　</span>
        <span>更新日：{{ $todo->updated_at }}</span>
        <br>
        <br>
        <p>{{ $todo->content }}</p>
    </div>
</div>
@endsection
