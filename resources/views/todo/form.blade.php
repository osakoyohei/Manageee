@extends('layouts.layout')
@section('title', 'ToDo登録')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>ToDo登録</h2>
        <form method="POST" action="{{ route('store') }}" onSubmit="return checkSubmit()">
        @csrf
            <div class="form-group">
                <label for="title">
                    やること
                </label>
                <input
                    id="title"
                    name="title"
                    class="form-control"
                    value="{{ old('title') }}"
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
                >{{ old('content') }}</textarea>
                @if ($errors->has('content'))
                    <div class="text-danger">
                        {{ $errors->first('content') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="deadline">
                    締め切り日
                </label>
                <input
                    id="deadline"
                    name="deadline"
                    class="form-control"
                    value="{{ old('deadline') }}"
                    type="date"
                >
                @if ($errors->has('deadline'))
                    <div class="text-danger">
                        {{ $errors->first('deadline') }}
                    </div>
                @endif
            </div>
            <div class="mt-5">
                <button type="submit" class="btn btn-primary">
                    登録する
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
if(window.confirm('登録してよろしいですか？')){
    return true;
} else {
    return false;
}
}
</script>
@endsection