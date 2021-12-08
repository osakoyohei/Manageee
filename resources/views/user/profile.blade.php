@extends('layouts.layout')
@section('title', 'プロフィールページ')
@section('content')

<h1>プロフィールページ</h1>
<hr>
<h4>名前：{{ Auth::user()->name }}</h4>

@endsection