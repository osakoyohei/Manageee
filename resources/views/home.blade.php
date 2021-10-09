@extends('layouts.layout')
@section('title', 'ToDoList')
@push('css')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="index">

    <x-alert type="danger" :session="session('danger')"/>

    <div class="title">
        <h1>ToDoListで作業効率向上を目指す！</h1>
        <h4>やらないといけない作業があるのにどんどん後回しにしてしまい、</h4>
        <h4>結局作業をするのを忘れてしまった経験はありませんか？</h4>
        <h4>そこで活用できるのが、<span class="title-under">「ToDoリスト」</span>です！</h4>
    </div>

    @if(Auth::check())
        <div class="login-user">
            <a href="{{ route('todo.index') }}" class="button-login">はじめる</a>
        </div>
    @else
        <div class="guest-user">
            <a href="{{ route('login.guest') }}" class="button-guest">お試しはこちら</a>
        </div>
    @endif
     
    <div class="todolist-explanation">
        <h2><span class="explanation-under">ToDoリストとは？</span></h2>
        ToDoリストとはやることリストとも言われ、頭の中にあるやるべきことを整理するのに使われます。<br>
        やるべきことをはっきりさせることで、今自分が何をすべきなのかということが明確になり、<br>
        ToDoの抜け漏れを防ぎ、実行までしっかり管理することができるようになります。<br>
    </div>

    <div class="todo-explanation">
        <h2><span class="explanation-under">ToDoとは？</span></h2>
        「ToDo」とは、「いつかするべきこと、しなければならないこと」を意味する言葉です。<br>
        ある作業をしないといけないが、明確な期限が決まっていないものがToDoと言えます。<br>
        ToDoには「ある程度、この日時までには終える必要がある」というニュアンスは含みますが、<br>
        はっきりとは期限が決まっているわけではありません。<br>
        テスト
    </div>

</div>
@endsection