@extends('layouts.layout')
@section('title', 'ToDo完了履歴一覧')
@push('css')
    @if(app('env')=='local')
        <link href="{{ asset('/css/user-information/todo-history-index.css') }}" rel="stylesheet">
    @endif
    @if(app('env')=='production')
        <link href="{{ secure_asset('/css/user-information/todo-history-index.css') }}" rel="stylesheet">
    @endif
@endpush

@section('content')

<div class="todo-history">

    <h2>ToDo完了履歴一覧</h2>
    <br>

    @if(empty($todoHistories[0]['user_id']))
        <h5>ToDo完了履歴がありません。</h5>
    @else
        <table class="table table-striped">
            <tr>
                <th>やること</th>
                <th>完了日 @sortablelink('created_at', '')</th>
                <th class="col-2"></th>
            </tr>
            @foreach($todoHistories as $todoHistory)
            <tr>
                <td class="py-4">{{ Str::limit($todoHistory->title, 10, '…' ) }}</td>
                <td class="py-4">{{ $todoHistory->created_at->format('Y/m/d') }}</td>
                <td><button type="button" class="btn btn-primary" onclick="location.href='{{ route('history.show', $todoHistory->id) }}'">詳細</button></td>
            </tr>
            @endforeach
        </table>
        {{ $todoHistories->appends(request()->query())->links() }}
    @endif

</div>


@endsection