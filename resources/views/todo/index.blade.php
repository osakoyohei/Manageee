@extends('layouts.layout')
@section('title', 'Manageee')
@section('content')
@push('css')
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endpush
<div class="index">
    <h1>ToDoを管理！</h1>

    やらないといけない作業があるのにどんどん後回しにしてしまい、結局作業をするのを忘れてしまった経験はありませんか？<br>
    そこで活用できるのが、「ToDoリスト」です！<br>
    ToDoリストを用いることで、効率的に作業を管理することが可能となります！<br><br>

    <h2>Todoのメリット</h2>
    <ul>
        <li>ToDoの抜け漏れがなくなる</li>
        <li>優先順位を付けられる</li>
        <li>スケジュールを立てることができる</li>
        <li>頭の中を整理できる</li>
    </ul>
</div>
@endsection