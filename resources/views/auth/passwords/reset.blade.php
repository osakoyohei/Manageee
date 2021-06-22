@extends('layouts.layout')
@section('title', 'パスワード更新フォーム')
@push('css')
    <link href="{{ asset('css/floating-labels.css') }}" rel="stylesheet">
@endpush
@section('content')
<form method="POST" action="{{ route('password.update') }}" class="form-signin">
@csrf
    <h1>パスワード更新</h1><br>

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-label-group">
        <input type="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="メールアドレス" required autocomplete="email" autofocus>
        <label for="inputEmail">メールアドレス</label>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="パスワード" required autocomplete="new-password">
        <label for="inputPassword">パスワード</label>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-label-group">
        <input type="password" id="inputPasswordConfirm" class="form-control" name="password_confirmation" placeholder="パスワード確認" required autocomplete="new-password">
        <label for="inputPasswordConfirm">パスワード確認</label>
    </div>
    <br>

    <button class="btn btn-lg btn-primary btn-block" type="submit">パスワードを更新する</button>
</form>
@endsection
