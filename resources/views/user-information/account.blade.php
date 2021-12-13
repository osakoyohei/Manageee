@extends('layouts.layout')
@section('title', 'アカウントページ')
@push('css')
    @if(app('env')=='local')
        <link href="{{ asset('/css/user-information/account.css') }}" rel="stylesheet">
    @endif
    @if(app('env')=='production')
        <link href="{{ secure_asset('/css/user-information/account.css') }}" rel="stylesheet">
    @endif
@endpush
@section('content')

<h1>アカウントページ</h1>
<hr>

<form method="POST" action="{{ route('account.update') }}" onSubmit="return checkSubmit()">
    @csrf
    <div class="form-group">
        <label for="email">
            メールアドレス
        </label>
        <input type="text" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
        @if ($errors->has('email'))
            <div class="text-danger">
                {{ $errors->first('email') }}
            </div>
        @endif
    </div>
    <div class="mt-5">
        <button type="submit" class="btn btn-secondary">保存</button>
    </div>
</form>

<script>
    function checkSubmit(){
        if(window.confirm('保存してよろしいですか？')){
            return true;
        } else {
            return false;
        }
    }
</script>

@endsection