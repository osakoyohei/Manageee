@extends('layouts.layout')
@section('title', '新規登録フォーム')
@push('css')
    <link href="{{ asset('css/floating-labels.css') }}" rel="stylesheet">
@endpush
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        
<x-alert type="success" :session="session('success')"/>
<x-alert type="danger" :session="session('danger')"/>

<form method="POST" action="{{ route('register') }}" class="form-signin">
@csrf
    <h1>新規登録フォーム</h1><br>

    <div class="form-label-group">
        <input type="name" id="inputName" class="form-control" name="name" placeholder="名前" required autofocus>
        <label for="inputName">名前</label>
    </div>

    <div class="form-label-group">
        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="メールアドレス" required>
        <label for="inputEmail">メールアドレス</label>
    </div>

    <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" name="password"placeholder="パスワード" required>
        <label for="inputPassword">パスワード</label>
    </div>

    <div class="form-label-group">
        <input type="password" id="inputPasswordConfirm" class="form-control" name="password_confirmation" placeholder="パスワード確認" required>
        <label for="inputPasswordConfirm">パスワード確認</label>
    </div>
    <br>

    <button class="btn btn-lg btn-primary btn-block" type="submit">新規登録</button>
</form>
@endsection