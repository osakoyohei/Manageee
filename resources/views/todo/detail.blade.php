@extends('layouts.layout')
@section('title', 'ToDo詳細')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h3>{{ $todo->title }}</h3>
        <span>登録日：{{ $todo->created_at->format('Y/m/d') }}　</span>
        <br>
        <p>{{ $todo->content }}</p>
    </div>
</div>
@endsection
