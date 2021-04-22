<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;

class TodoController extends Controller
{
    /**
     * ToDoリストを表示する
     * 
     * @return view  
     *
     */
    public function showList()
    {
        $todos = Todo::all();
        return view('todo.list', ['todos' => $todos]);
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
        //ToDoのデータを受け取る
        $inputs = $request->all();

        \DB::beginTransaction();
        try {
            Todo::create($inputs);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', 'ToDoを登録しました。');
        return redirect(route('todos'));
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
                'content' => $inputs['content']
            ]);
            $todo->save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        
        \Session::flash('err_msg', 'ToDoを更新しました。');
        return redirect(route('todos'));
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
        
        \Session::flash('err_msg', '削除しました。');
        return redirect(route('todos'));
    }
}
