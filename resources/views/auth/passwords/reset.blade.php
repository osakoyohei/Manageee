@extends('layouts.layout')
@section('title', 'パスワードリセットフォーム')
@push('css')
    <link href="{{ asset('css/floating-labels.css') }}" rel="stylesheet">
@endpush
@section('content')
<form method="POST" action="{{ route('password.update') }}" class="form-signin">
@csrf
    <h1>パスワードリセット</h1><br>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <h6>・{{ $error }}</h6>
            @endforeach
        </div>
    @endif

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-label-group">
        <input type="text" id="inputEmail" class="form-control" name="email" value="{{ old('email') }}" placeholder="メールアドレス">
        <label for="inputEmail">メールアドレス</label>
    </div>

    <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="パスワード">
        <label for="inputPassword">パスワード</label>
    </div>

    <div class="form-label-group">
        <input type="password" id="inputPasswordConfirm" class="form-control" name="password_confirmation" placeholder="パスワード確認">
        <label for="inputPasswordConfirm">パスワード確認</label>
    </div>
    <br>

    <button class="btn btn-lg btn-primary btn-block" type="submit">パスワードをリセットする</button>
</form>
@endsection
