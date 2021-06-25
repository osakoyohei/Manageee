@extends('layouts.layout')
@section('title', 'パスワード再設定メールアドレス送信フォーム')
@push('css')
    <link href="{{ asset('css/floating-labels.css') }}" rel="stylesheet">
@endpush
@section('content')
<form method="POST" action="{{ route('password.email') }}" class="form-signin">
@csrf

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <h1>パスワードの再設定</h1><br>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                ・{{ $error }}<br>
            @endforeach
        </div>
    @endif

    <div class="form-label-group">
        <input type="text" id="inputEmail" class="form-control" name="email" value="{{ old('email') }}" placeholder="メールアドレス">
        <label for="inputEmail">メールアドレス</label>
    </div>
    <br>

    <button class="btn btn-lg btn-primary btn-block" type="submit">パスワード再設定メール送信</button>
</form>
@endsection
