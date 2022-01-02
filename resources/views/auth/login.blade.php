@extends('layouts.layout')
@section('title', 'ログインフォーム')
@push('css')
    <!-- form.css -->
    @if(app('env')=='local')
        <link href="{{ asset('css/floating-labels.css') }}" rel="stylesheet">
    @endif
    @if(app('env')=='production')
        <link href="{{ secure_asset('css/floating-labels.css') }}" rel="stylesheet">
    @endif

    <!-- reCAPTCHA v2 -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script> 
@endpush
@section('content')
<form method="POST" action="{{ route('login') }}" class="form-signin">
@csrf

    <x-alert type="success" :session="session('success')"/>
    <x-alert type="danger" :session="session('danger')"/>

    <h1>ログインフォーム</h1><br>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                ・{{ $error }}<br>
            @endforeach
        </div>
    @endif

    <div class="form-label-group">
        <input type="text" id="inputEmail" name="email" class="form-control" value="{{ old('email') }}" placeholder="メールアドレス">
        <label for="inputEmail">メールアドレス</label>
    </div>

    <div class="form-label-group">
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="パスワード(8文字以上)">
        <label for="inputPassword">パスワード（8文字以上）</label>
    </div>
    <span id="buttonEye" class="fa fa-eye" onclick="pushHideButton()"></span>

    <div class="g-recaptcha" data-sitekey="{{ config('no-captcha.sitekey', 'no-captcha-sitekey') }}"></div>
    <br>

    <button class="btn btn-lg btn-primary btn-block" type="submit">ログイン</button><br>

    <button class="btn btn-lg btn-success btn-block" type="button" onclick="location.href='{{ route('login.guest') }}'">ゲストログイン</button><br>

    <div class="password-reset">
        <a href="{{ route('password.request') }}">パスワードお忘れの方</a>
    </div>
</form>
@endsection
<script>
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
</script>