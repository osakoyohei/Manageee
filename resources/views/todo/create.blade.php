@extends('layouts.layout')
@section('title', 'ToDo登録')
@push('css')
    <link href="{{ secure_asset('/css/create.css') }}" rel="stylesheet">
@endpush
@section('content')

<div class="todo_form">
    <h2>ToDo登録</h2>
    <form method="POST" action="{{ route('todo.store') }}" onSubmit="return checkSubmit()">
    @csrf
        <div class="form-group">
            <label for="title">
                やること
            </label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
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
            <textarea id="content" name="content" class="form-control" rows="4">{{ old('content') }}</textarea>
            @if ($errors->has('content'))
                <div class="text-danger">
                    {{ $errors->first('content') }}
                </div>
            @endif
        </div>

        <div class="mt-5">
            <a class="btn btn-secondary" href="{{ route('todo.index') }}">キャンセル</a>
            <button type="submit" class="btn btn-primary">登録する</button>
        </div>
    </form>
</div>
<script>
function checkSubmit(){
    if(window.confirm('登録してよろしいですか？')){
        return true;
    } else {
        return false;
    }
}
</script>
@endsection