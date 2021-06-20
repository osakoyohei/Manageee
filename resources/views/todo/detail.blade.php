@extends('layouts.layout')
@section('title', 'ToDo詳細')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h3>{{ $todo->title }}</h3>
        <span>登録日：{{ $todo->created_at->format('Y/m/d') }}　</span>
        <br>
        <p>{{ $todo->content }}</p>

        <form method="POST" action="{{ route('delete', $todo->id) }}" onSubmit="return checkDelete()">
        @csrf
            <td><button type="submit"><i class="fas fa-trash-alt"></i></button></td>
        </form>
    </div>
</div>
<script>
function checkDelete(){
    if(window.confirm('ToDoを削除してよろしいですか？')){
        return true;
    } else {
        return false;
    }
}
</script>
@endsection
