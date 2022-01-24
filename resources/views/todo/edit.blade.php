@extends('layouts.layout')
@section('title', 'ToDo編集')
@push('css')
    @if(app('env')=='local')
        <link href="{{ asset('/css/todo-edit.css') }}" rel="stylesheet">
    @endif
    @if(app('env')=='production')
        <link href="{{ secure_asset('/css/todo-edit.css') }}" rel="stylesheet">
    @endif
@endpush
@section('content')

<div class="edit">
    <h2>ToDo編集</h2>
    <form method="POST" action="{{ route('todo.update') }}" onSubmit="return checkSubmit()">
    @csrf
        <input type="hidden" name="id" value="{{ $todo->id }}">
        
        <div class="form-group">
            <label for="title">
                やること
            </label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $todo->title }}" >
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
            <textarea id="content" name="content" class="form-control" rows="4">{{ $todo->content }}</textarea>
            @if ($errors->has('content'))
                <div class="text-danger">
                    {{ $errors->first('content') }}
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="category">カテゴリー</label><br>
            <select name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        @if($category->id == $todo->category_id) selected @endif>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('category'))
                <div class="text-danger">
                    {{ $errors->first('category') }}
                </div>
            @endif
        </div>

        <div class="mt-5">
            <a class="btn btn-secondary" href="{{ route('todo.index') }}">キャンセル</a>
            <button type="submit" class="btn btn-primary">更新する</button>
        </div>
    </form>
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