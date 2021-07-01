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
                ・{{ $error }}<br>
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
    <span id="buttonEye" class="fa fa-eye" onclick="pushHideButton()"></span>

    <div class="form-label-group">
        <input type="password" id="inputPasswordConfirm" class="form-control" name="password_confirmation" placeholder="パスワード確認">
        <label for="inputPasswordConfirm">パスワード確認</label>
    </div>
    <span id="buttonEyeConfirm" class="fa fa-eye" onclick="pushHideButtonConfirm()"></span>
    <br>

    <button class="btn btn-lg btn-primary btn-block" type="submit">パスワードをリセットする</button>
</form>
@endsection
<script>
// パスワードの表示・非表示切替
function pushHideButton() {
    var txtPass = document.getElementById("inputPassword");
    var btnEye = document.getElementById("buttonEye");
    if (txtPass.type === "text") {
        txtPass.type = "password";
        btnEye.className = "fa fa-eye";
    } else {
        txtPass.type = "text";
        btnEye.className = "fa fa-eye-slash";
    }
}
// パスワードの表示・非表示切替（パスワード確認）
function pushHideButtonConfirm() {
    var txtPass = document.getElementById("inputPasswordConfirm");
    var btnEye = document.getElementById("buttonEyeConfirm");
    if (txtPass.type === "text") {
        txtPass.type = "password";
        btnEye.className = "fa fa-eye";
    } else {
        txtPass.type = "text";
        btnEye.className = "fa fa-eye-slash";
    }
}
</script>