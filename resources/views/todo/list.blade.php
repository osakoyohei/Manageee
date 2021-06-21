@extends('layouts.layout')
@section('title', 'ToDoリスト')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-2">

        @if (session('status'))
            <div class="alert alert-primary" role="alert">
                {{ session('status') }}
            </div>
        @endif
        
        <x-alert type="success" :session="session('success')"/>
        <x-alert type="primary" :session="session('primary')"/>
        <x-alert type="danger" :session="session('danger')"/>


        <h2>{{ Auth::user()->name }}<small>さんの</small>ToDoリスト</h2><br>
        <h4>本日 : {{ now()->format('Y年m月d日') }}</h4><br>

        @if(empty($todos[0]['user_id']))
            <h5>ToDoが登録されていません。</h5>
        @else
            <table class="table table-striped">
                <tr>
                    <th>やること</th>
                    <th>登録日</th>
                    <th>経過日数</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($todos as $todo)
                <tr>
                    <td>{{ $todo->title }}</td>
                    <td>{{ $todo->created_at->format('Y/m/d') }}</td>
                    <td>{{ $today->diffInDays($todo->created_at->format('Y/m/d')) }}日</td>
                    <td><button type="button" onclick="location.href='/todo/{{ $todo->id }}'"><i class="far fa-list-alt"></i></button></td>
                    <td><button type="button" onclick="location.href='/todo/edit/{{ $todo->id }}'"><i class="fas fa-edit"></i></button></td>
                    <form method="POST" action="{{ route('done', $todo->id) }}" onSubmit="return checkDelete()">
                    @csrf
                        <td><button type="submit"><i class="fas fa-check"></i></button></td>
                    </form>
                </tr>
                @endforeach
            </table>
        @endif
    </div>
</div>
<script>
function checkDelete(){
    if(window.confirm('ToDoを完了してよろしいですか？')){
        return true;
    } else {
        return false;
    }
}
</script>
@endsection
