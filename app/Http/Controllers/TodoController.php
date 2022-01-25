<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Category;
use App\Models\TodoHistory;
use App\Models\Tag;

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
        if (is_null($id)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('todo.index'));
        }

        $todo = Todo::find($id);
        $today = Carbon::today();

        return view('todo.show', [
            'todo' => $todo,
            'today' => $today,
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
            $todo = new Todo;
            $todo->user_id = Auth::id();
            $todo->title = $request->title;
            $todo->content = $request->content;
            $todo->category_id = $request->category_id;

            preg_match_all('/#([a-zA-Z0-9０-９ぁ-んァ-ヶー一-龠]+)/u', $request->content, $match);
            $tags = [];
            foreach ($match[1] as $tag) {
                $found = Tag::firstOrCreate(['tag_name' => $tag]);
                array_push($tags, $found);
            }
            $tag_ids = [];
            foreach ($tags as $tag) {
                array_push($tag_ids, $tag['id']);
            }
            $todo->save();
            $todo->tags()->attach($tag_ids);
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
                'category_id' => $request->category_id,
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
     * ToDoを完了する（ToDo完了履歴に登録）。
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

        $todo = Todo::find($id);

        \DB::beginTransaction();
        try {
            TodoHistory::create([
                'user_id' => Auth::id(),
                'title' => $todo->title,
                'content' => $todo->content,
                'category_id' => $todo->category_id,
                'todo_created_at' => $todo->created_at,
            ]);

            Todo::destroy($id);

            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
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
    
    /**
     * キーワード検索、カテゴリー検索。
     * 
     * @param Request $request
     * @return view
     */
    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $categoryId = $request->category_id;

        $search = Todo::where('user_id', Auth::id());

        if (!empty($keyword)) {
            $search->where('title', 'like', '%'. $keyword. '%');
        }
        if (!empty($categoryId)) {
            $search->where('category_id', $categoryId);
        }

        $todos = $search->sortable()->paginate(5);
        $today = Carbon::today();
        $categories = Category::all();
        $categoryName = '';
        if (!empty($categoryId)) {
            $categoryName = Category::find($categoryId)->category_name;
        }

        return view('todo.index', [
            'todos' => $todos,
            'today' => $today,
            'categories' => $categories,
            'keyword' => $keyword,
            'categoryId' => $categoryId,
            'categoryName' => $categoryName,
        ]);
    }

    /**
     * タグ検索。
     * 
     * @param int $id TagのID。
     * @return view
     */
    public function tagSeach($id)
    {
        if (is_null(Tag::find($id))) {
            abort(404);
        }

        $todos = Tag::find($id)->todos()->where('user_id', Auth::id())->sortable()->paginate(5);
        
        if ($todos->isEmpty()){
            abort(404);
        }

        $today = Carbon::today();
        $categories = Category::all();
        $categoryId = '';
        $tagName = Tag::find($id)->tag_name;

        return view('todo.index', [
            'todos' => $todos,
            'today' => $today,
            'categories' => $categories,
            'categoryId' => $categoryId,
            'tagName' => $tagName,
        ]);
    }
}
