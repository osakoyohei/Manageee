@extends('layouts.layout')
@section('title', 'ログインフォーム')
@push('css')
    <!-- form.css -->
    <link href="{{ asset('css/floating-labels.css') }}" rel="stylesheet">

    <!-- reCAPTCHA v2 -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script> 
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

<form method="POST" action="{{ route('login') }}" class="form-signin">
@csrf
    <h1>ログインフォーム</h1><br>
    <div class="form-label-group">
        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="メールアドレス" required autofocus>
        <label for="inputEmail">メールアドレス</label>
    </div>

    <div class="form-label-group">
        <input type="password" id="inputPassword" class="form-control" name="password" placeholder="パスワード" required>
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