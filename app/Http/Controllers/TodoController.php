<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Category;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $id = $request->route()->parameter('id'); //todoのidを取得
            if(!is_null($id)) { //idのnull判定
                $todoId = Todo::findOrFail($id)->user_id;
                if($todoId !== Auth::id()) {
                    abort(404);
                }
            }
            
            return $next($request);
        });
    }

    /**
     * ToDoリストを表示する。
     * 
     * @return view  
     */
    public function index()
    {
        $todos = Todo::sortable()->with('category')->where('user_id', Auth::id())->paginate(5);
        $today = Carbon::today();
        $categories = Category::all();
        $categoryId = '';

        return view('todo.index', [
            'todos' => $todos,
            'today' => $today,
            'categories' => $categories,
            'categoryId' => $categoryId,
        ]);
    }

    /**
     * ToDoの詳細を表示する。
     * 
     * @param int $id 詳細を表示するToDoのID。
     * @return view
     */
    public function show($id)
    {
        $todo = Todo::find($id);
        
        if (is_null($todo)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('todo.index'));
        }

        return view('todo.show', [
            'todo' => $todo,
        ]);
    }

    /**
     * ToDo登録画面を表示する。
     * 
     * @return view
     */
    public function create()
    {
        $categories = Category::all();

        return view('todo.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * ToDoを登録する。
     * 
     * @param TodoRequest $request
     * @return view
     */
    public function store(TodoRequest $request)
    {
        \DB::beginTransaction();
        try {
            Todo::create([
                'user_id' => Auth::id(),
                'title' => $request->title,
                'content' => $request->content,
                'category_id' => $request->category,
            ]);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        return redirect(route('todo.index'))->with('success', 'ToDoを登録しました！');
    }

    /**
     * ToDoの編集画面を表示する。
     * 
     * @param int $id 編集するToDoのID。
     * @return view
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        $categories = Category::all();

        if (is_null($todo)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('todo.index'));
        }
        
        return view('todo.edit', [
            'todo' => $todo,
            'categories' => $categories,
        ]);
    }

    /**
     * ToDoを編集する。
     * 
     * @param TodoRequest $request
     * @return view
     */
    public function update(TodoRequest $request)
    {
        \DB::beginTransaction();
        try {
            $todo = Todo::find($request->id);
            $todo->fill([
                'title' => $request->title,
                'content' => $request->content,
                'category_id' => $request->category,
            ]);
            $todo->save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        
        return redirect(route('todo.index'))->with('success', 'ToDoを更新しました！');
    }

    /**
     * ToDoを完了する。
     * 
     * @param int $id ToDoを完了するID。
     * @return view
     */
    public function done($id)
    {
        if (empty($id)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('todo.index'));
        }
        
        try {
            Todo::destroy($id);
        } catch(\Throwable $e) {
            abort(500);
        }
        
        return redirect(route('todo.index'))->with('danger', 'ToDoを完了しました！');
    }

     /**
     * ToDoを削除する。
     * 
     * @param int $id ToDoを削除するID。
     * @return view
     */
    public function delete($id)
    {
        if (empty($id)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('todo.index'));
        }
        
        try {
            Todo::destroy($id);
        } catch(\Throwable $e) {
            abort(500);
        }
        
        return redirect(route('todo.index'))->with('danger', 'ToDoを削除しました！');
    }
    
}
