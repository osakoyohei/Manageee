<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TodoHistory;

class TodoHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $id = $request->route()->parameter('id'); //todo_historyのidを取得
            if(!is_null($id)) { //idのnull判定
                $todoId = TodoHistory::findOrFail($id)->user_id;
                if($todoId !== Auth::id()) {
                    abort(404);
                }
            }
            
            return $next($request);
        });
    }

    /**
     * ToDo完了リストを表示する。
     * 
     * @return view  
     */
    public function index()
    {
        $todoHistories = TodoHistory::sortable()->where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(5);
    
        return view('user-information.todo-history.index', [
            'todoHistories' => $todoHistories,
        ]);
    }

    /**
     * ToDo完了詳細を表示する。
     * 
     * @param int $id 詳細を表示するToDo完了のID。
     * @return view
     */
    public function show($id)
    {        
        if (is_null($id)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('todo.index'));
        }

        $todoHistory = TodoHistory::find($id);

        return view('user-information.todo-history.show', [
            'todoHistory' => $todoHistory,
        ]);
    }

}
