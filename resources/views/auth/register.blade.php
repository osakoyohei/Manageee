@extends('layouts.layout')
@section('title', '新規登録フォーム')
@push('css')
    <link href="{{ asset('css/floating-labels.css') }}" rel="stylesheet">
@endpush
@section('content')
<form method="POST" action="{{ route('register') }}" class="form-signin">
@csrf
    <h1>新規登録フォーム</h1><br>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                ・{{ $error }}<br>
            @endforeach
        </div>
    @endif

    <div class="form-label-group">
        <input type="name" id="inputName" name="name" class="form-control" value="{{ old('name') }}" placeholder="名前">
        <label for="inputName">名前</label>
    </div>

    <div class="form-label-group">
        <input type="text" id="inputEmail" name="email" class="form-control" value="{{ old('email') }}" placeholder="メールアドレス">
        <label for="inputEmail">メールアドレス</label>
    </div>

    <div class="form-label-group">
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="パスワード">
        <label for="inputPassword">パスワード</label>
    </div>

    <div class="form-label-group">
        <input type="password" id="inputPasswordConfirm" name="password_confirmation" class="form-control" placeholder="パスワード確認">
        <label for="inputPasswordConfirm">パスワード確認</label>
    </div>
    <br>

    <button class="btn btn-lg btn-primary btn-block" type="submit">新規登録</button>
</form>
@endsection