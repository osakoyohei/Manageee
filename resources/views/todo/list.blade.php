@extends('layout')
@section('title', 'ToDoリスト')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-2">

        <h2>{{ Auth::user()->name }}<small>さんの</small>ToDoリスト</h2><br>
        
        <x-alert type="success" :session="session('success')"/>
        <x-alert type="primary" :session="session('primary')"/>
        <x-alert type="danger" :session="session('danger')"/>

        @if(empty($todos[0]['user_id']))
            <h5>ToDoが登録されていません。</h5>
        @else
            <table class="table table-striped">
                <tr>
                    <th>やること</th>
                    <th>登録日</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($todos as $todo)
                <tr>
                    <td><a href="/todo/{{ $todo->id }}">{{ $todo->title }}</a></td>
                    <td>{{ $todo->created_at->format('Y/m/d') }}</td>
                    <td><button type="button" class="btn btn-primary" onclick="location.href='/todo/edit/{{ $todo->id }}'">編集</button></td>
                    <form method="POST" action="{{ route('delete', $todo->id) }}" onSubmit="return checkDelete()">
                    @csrf
                        <td><button type="submit" class="btn btn-danger" onclick=>削除</button></td>
                    </form>
                </tr>
                @endforeach
            </table>
        @endif
    </div>
</div>
<script>
function checkDelete(){
    if(window.confirm('削除してよろしいですか？')){
        return true;
    } else {
        return false;
    }
}
</script>
@endsection
