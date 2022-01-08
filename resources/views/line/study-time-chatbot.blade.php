@extends('layouts.layout')
@section('title', '勉強時間計測ボット')
@push('css')
    @if(app('env')=='local')
        <link href="{{ asset('/css/study-time-chatbot.css') }}" rel="stylesheet">
    @endif
    @if(app('env')=='production')
        <link href="{{ secure_asset('/css/study-time-chatbot.css') }}" rel="stylesheet">
    @endif
@endpush
@section('content')

<!-- LINE 勉強時間計測ボット -->
<div class="chatbot-explanation">
    <h3><span class="study-time-chatbot">勉強時間計測ボット</span></h3>
    <p>勉強時間計測ボットを友だち追加して勉強時間を計測しよう！</p>

    <a href="https://lin.ee/pP3AIhM" target="_blank" rel="noopener noreferrer">
        <img src="https://scdn.line-apps.com/n/line_add_friends/btn/ja.png" alt="友だち追加" height="36" border="0" class="mb-3">
    </a>

    <video width="400px" height="500px" src="/videos/study-time-chatbot.MOV" autoplay muted loop controls playsinline></video>
    
</div>

@endsection
