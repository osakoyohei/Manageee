@extends('layouts.layout')
@section('title', '新規登録フォーム')
@section('content')
@push('css')
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">
@endpush
<main class="form-signin">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <h1 class="h3 mb-3 fw-normal">新規登録フォーム</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <x-alert type="danger" :session="session('danger')"/>

        <div class="form-floating">
            <label for="floatingName">名前</label>
            <input type="text" class="form-control" id="floatingName" name="name" placeholder="名前">
        </div>
        <br>
        <div class="form-floating">
            <label for="floatingEmail">メールアドレス</label>
            <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="メールアドレス">
        </div>
        <br>
        <div class="form-floating">
            <label for="floatingPassword">パスワード</label>
            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="パスワード">
        </div>
        <br>
        <div class="form-floating">
            <label for="floatingPasswordConfirm">パスワード確認</label>
            <input type="password" class="form-control" id="floatingPasswordConfirm" name="password_confirm" placeholder="パスワード確認">
        </div>
        <br>
        <button class="w-100 btn btn-lg btn-primary" type="submit">新規登録</button>
    </form>
</main>
@endsection