@extends('layouts.layout')
@section('title', 'プロフィールページ')
@push('css')
    @if(app('env')=='local')
        <link href="{{ asset('/css/user-information/profile.css') }}" rel="stylesheet">
    @endif
    @if(app('env')=='production')
        <link href="{{ secure_asset('/css/user-information/profile.css') }}" rel="stylesheet">
    @endif
@endpush

@section('content')

<div class="profile">

    <x-alert type="success" :session="session('success')"/>

    <h2>プロフィールページ</h2>
    <hr>
    
    <form method="POST" action="{{ route('profile.update') }}" onSubmit="return checkSubmit()">
        @csrf
        <div class="form-group">
            <label for="name">
                名前：
            </label>
            @if (Auth::id() === 1)
                <input type="text"class="form-control" value="{{ Auth::user()->name }}" disabled>
            @else
                <input type="text" id="name" name="name" class="form-control" value="{{ Auth::user()->name }}">
                @if ($errors->has('name'))
                    <div class="text-danger">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            @endif
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-secondary">保存</button>
        </div>
    </form>
</div>

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