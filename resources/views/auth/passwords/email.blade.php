@extends('layouts.layout')
@section('title', '再設定メールアドレス送信フォーム')
@push('css')
    <link href="{{ asset('css/floating-labels.css') }}" rel="stylesheet">
@endpush
@section('content')
<form method="POST" action="{{ route('password.email') }}" class="form-signin">
@csrf

    <!-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
             -->
    <x-alert type="success" :session="session('success')"/>
    <x-alert type="danger" :session="session('danger')"/>

    <h1>パスワードの再設定</h1><br>
    <div class="form-label-group">
        <input type="email" id="inputEmail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="メールアドレス" required autocomplete="email" autofocus>
        <label for="inputEmail">メールアドレス</label>
    </div>
    <br>
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <button class="btn btn-lg btn-primary btn-block" type="submit">パスワード再設定メール送信</button>
</form>
@endsection
