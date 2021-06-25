@extends('layouts.layout')
@section('title', 'ログインフォーム')
@push('css')
    <!-- form.css -->
    <link href="{{ asset('css/floating-labels.css') }}" rel="stylesheet">

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
                <h6>・{{ $error }}</h6>
            @endforeach
        </div>
    @endif

    <div class="form-label-group">
        <input type="text" id="inputEmail" name="email" class="form-control" value="{{ old('email') }}" placeholder="メールアドレス">
        <label for="inputEmail">メールアドレス</label>
    </div>

    <div class="form-label-group">
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="パスワード">
        <label for="inputPassword">パスワード</label>
    </div>

    <div class="g-recaptcha" data-sitekey="{{ config('no-captcha.sitekey', 'no-captcha-sitekey') }}"></div>
    <br>

    <button class="btn btn-lg btn-primary btn-block" type="submit">ログイン</button><br>

    <div class="password-reset">
        <a href="{{ route('password.request') }}">パスワードお忘れの方</a>
    </div>
</form>
@endsection