@extends('layouts.layout')
@section('title', 'ToDo編集')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>ToDo編集</h2>
        <form method="POST" action="{{ route('update') }}" onSubmit="return checkSubmit()">
        @csrf
            <input type="hidden" name="id" value="{{ $todo->id }}">
            <div class="form-group">
                <label for="title">
                    やること
                </label>
                <input
                    id="title"
                    name="title"
                    class="form-control"
                    value="{{ $todo->title }}"
                    type="text"
                >
                @if ($errors->has('title'))
                    <div class="text-danger">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="content">
                    内容
                </label>
                <textarea
                    id="content"
                    name="content"
                    class="form-control"
                    rows="4"
                >{{ $todo->content }}</textarea>
                @if ($errors->has('content'))
                    <div class="text-danger">
                        {{ $errors->first('content') }}
                    </div>
                @endif
            </div>
            <div class="mt-5">
                <button type="submit" class="btn btn-primary">
                    更新する
                </button>
                <a class="btn btn-secondary" href="{{ route('todos') }}">
                    キャンセル
                </a>
                
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if(window.confirm('更新してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection