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
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="パスワード（8文字以上）">
        <label for="inputPassword">パスワード（8文字以上）</label>
    </div>
    <span id="buttonEye" class="fa fa-eye" onclick="pushHideButton()"></span>

    <div class="form-label-group">
        <input type="password" id="inputPasswordConfirm" name="password_confirmation" class="form-control" placeholder="パスワード確認（8文字以上）">
        <label for="inputPasswordConfirm">パスワード確認（8文字以上）</label>
    </div>
    <span id="buttonEyeConfirm" class="fa fa-eye" onclick="pushHideButtonConfirm()"></span>
    <br>

    <button class="btn btn-lg btn-primary btn-block" type="submit">新規登録</button>
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