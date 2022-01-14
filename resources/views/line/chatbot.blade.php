@extends('layouts.layout')
@section('title', 'LINEチャットボット')
@push('css')
    @if(app('env')=='local')
        <link href="{{ asset('/css/line-chatbot.css') }}" rel="stylesheet">
    @endif
    @if(app('env')=='production')
        <link href="{{ secure_asset('/css/line-chatbot.css') }}" rel="stylesheet">
    @endif
@endpush
@section('content')

<!-- LINEチャットボット -->
<div class="chatbot-explanation">
    <h2>名言チャットボット</h2><br>
    <h4>名言チャットボットを友達追加して、<br>毎朝届く偉人の名言でモチベーションを上げよう！</h4>
    <a href="https://lin.ee/1O8PgNv" target="_blank" rel="noopener noreferrer">
        <img src="https://scdn.line-apps.com/n/line_add_friends/btn/ja.png"  class="my-3" alt="友だち追加" height="36" border="0">
    </a>
</div>

@endsection