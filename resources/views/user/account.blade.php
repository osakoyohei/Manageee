@extends('layouts.layout')
@section('title', 'アカウントページ')
@push('css')
    @if(app('env')=='local')
        <link href="{{ asset('/css/edit.css') }}" rel="stylesheet">
    @endif
    @if(app('env')=='production')
        <link href="{{ secure_asset('/css/edit.css') }}" rel="stylesheet">
    @endif
@endpush
@section('content')

<h1>アカウントページ</h1>
<hr>
<h4>メールアドレス：{{ Auth::user()->email }}</h4>

@endsection