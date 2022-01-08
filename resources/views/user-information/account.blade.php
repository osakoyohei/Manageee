@extends('layouts.layout')
@section('title', 'アカウント設定ページ')
@push('css')
    @if(app('env')=='local')
        <link href="{{ asset('/css/user-information/account.css') }}" rel="stylesheet">
    @endif
    @if(app('env')=='production')
        <link href="{{ secure_asset('/css/user-information/account.css') }}" rel="stylesheet">
    @endif
@endpush
@section('content')

<div class="account">

    <x-alert type="success" :session="session('success')"/>

    <h2>アカウント設定ページ</h2>
    <hr>

    <form method="POST" action="{{ route('email.update') }}" onSubmit="return emailCheckSubmit()">
        @csrf
        <div class="form-group">
            <label for="email">
                メールアドレス設定：
            </label>
            @if (Auth::id() === 1)
                <input type="text" class="form-control" value="{{ Auth::user()->email }}" disabled>
            @else
                <input type="text" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                @if ($errors->has('email'))
                    <div class="text-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            @endif
        </div>

        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="パスワード（8文字以上）">
            @if ($errors->has('password'))
                <div class="text-danger">
                    {{ $errors->first('password') }}
                </div>
            @endif
            @if (session('password'))
                <div class="text-danger">
                    {{ session('password') }}
                </div>
            @endif
        </div>

        <div class="my-3">
            <button type="submit" class="btn btn-secondary">メールアドレスを変更する</button>
        </div>
    </form>
    <hr>
    <form method="POST" action="{{ route('password.update') }}" onSubmit="return passwordCheckSubmit()">
        @csrf
        <div class="form-group">
            <label for="currentPassword">
                パスワード設定：
            </label>
            <input type="password" id="currentPassword" name="currentPassword" class="form-control" placeholder="現在のパスワード">
            @if ($errors->has('currentPassword'))
                <div class="text-danger">
                    {{ $errors->first('currentPassword') }}
                </div>
            @endif
            @if (session('currentPassword'))
                <div class="text-danger">
                    {{ session('currentPassword') }}
                </div>
            @endif
        </div>

        <div class="form-group">
            <input type="password" name="newPassword" class="form-control" placeholder="新しいパスワード（8文字以上）">
            @if ($errors->has('newPassword'))
                <div class="text-danger">
                    {{ $errors->first('newPassword') }}
                </div>
            @endif
        </div>

        <div class="form-group">
            <input type="password" name="newPassword_confirmation" class="form-control" placeholder="新しいパスワード確認（8文字以上）">
            @if ($errors->has('newPassword_confirmation'))
                <div class="text-danger">
                    {{ $errors->first('newPassword_confirmation') }}
                </div>
            @endif
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-secondary">パスワードを変更する</button>
        </div>
    </form>
</div>

<script>
    // メールアドレス変更確認
    function emailCheckSubmit(){
        if(window.confirm('メールアドレスを変更してよろしいですか？')){
            return true;
        } else {
            return false;
        }
    }
    // パスワード変更確認
    function passwordCheckSubmit(){
        if(window.confirm('パスワードを変更してよろしいですか？')){
            return true;
        } else {
            return false;
        }
    }
</script>

@endsection