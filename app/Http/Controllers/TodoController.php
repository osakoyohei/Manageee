<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class TodoController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        return view('todo.index');
    }

    /**
     * ToDoリストを表示する
     * 
     * @return view  
     *
     */
    public function showList()
    {
        $user_id = Auth::id();
        $todos = Todo::where('user_id', $user_id)->get();
        $today = Carbon::today();
        return view('todo.list', [
            'todos' => $todos,
            'today' => $today,
        ]);
    }

    /**
     * ToDoの詳細を表示する
     * @param int $id
     * @return view  
     *
     */
    public function showDetail($id)
    {
        $todo = Todo::find($id);
        
        if (is_null($todo)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('todos'));
        }

        return view('todo.detail', ['todo' => $todo]);
    }

    /**
     * ToDo登録画面を表示する
     * 
     * @return view  
     *
     */
    public function showCreate()
    {
        return view('todo.form');
    }

    /**
     * ToDoを登録する
     * 
     * @return view  
     *
     */
    public function exeStore(TodoRequest $request)
    {
        $user_id = Auth::id();
        
        \DB::beginTransaction();
        try {
            Todo::create([
                'title' => $request['title'],
                'content' => $request['content'],
                'user_id' => $user_id,
            ]);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        return redirect(route('todos'))->with('success', 'ToDoを登録しました！');
    }

    /**
     * ToDo編集画面を表示する
     * @param int $id
     * @return view  
     *
     */
    public function showEdit($id)
    {
        $todo = Todo::find($id);
        
        if (is_null($todo)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('todos'));
        }
        
        return view('todo.edit', ['todo' => $todo]);
    }

    /**
     * ToDoを編集する
     * 
     * @return view  
     *
     */
    public function exeUpdate(TodoRequest $request)
    {
        //ToDoのデータを受け取る
        $inputs = $request->all();
        
        \DB::beginTransaction();
        try {
            $todo = Todo::find($inputs['id']);
            $todo->fill([
                'title' => $inputs['title'],
                'content' => $inputs['content'],
            ]);
            $todo->save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        
        return redirect(route('todos'))->with('primary', 'ToDoを更新しました！');
    }

    /**
     * ToDoを完了する
     * @param int $id
     * @return view  
     *
     */
    public function exeDone($id)
    {
        if (empty($id)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('todos'));
        }
        
        try {
            Todo::destroy($id);
        } catch(\Throwable $e) {
            abort(500);
        }
        
        return redirect(route('todos'))->with('danger', 'ToDoを完了しました！');
    }

     /**
     * ToDoを削除する
     * @param int $id
     * @return view  
     *
     */
    public function exeDelete($id)
    {
        if (empty($id)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('todos'));
        }
        
        try {
            Todo::destroy($id);
        } catch(\Throwable $e) {
            abort(500);
        }
        
        return redirect(route('todos'))->with('danger', 'ToDoを削除しました！');
    }
}
