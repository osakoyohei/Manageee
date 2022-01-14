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
    <h3><span class="line-chatbot"></span></h3>
    <p>名言チャットボット</p>
</div>

@endsection