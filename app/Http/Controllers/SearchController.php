<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Todo;
use Carbon\Carbon;

class SearchController extends Controller
{
    /**
     * やることキーワード検索。
     * 
     * @param Request $request
     * @return view
     */
    public function titleSearch(Request $request)
    {
        $keyword = $request->keyword;

        if (isset($keyword)) {
            $todo = Todo::where('title', 'like', '%'. $keyword. '%');
            $todos = $todo->sortable()->where('user_id', Auth::id())->paginate(5);
            $today = Carbon::today();
            $categories = Category::all();
            $categoryId = '';

            return view('todo.index', [
                'todos' => $todos,
                'today' => $today,
                'keyword' => $keyword,
                'categories' => $categories,
                'categoryId' => $categoryId,
            ]);
        } else {
            return back();
        }
    }

    /**
     * カテゴリー検索。
     * 
     * @param Request $request
     * @return view
     */
    public function categorySearch(Request $request)
    {
        $categoryId = $request->category;

        if (isset($categoryId)) {
            $category = Todo::where('category_id', $categoryId);
            $todos = $category->sortable()->where('user_id', Auth::id())->paginate(5);
            $today = Carbon::today();
            $categories = Category::all();

            return view('todo.index', [
                'todos' => $todos,
                'today' => $today,
                'categories' => $categories,
                'categoryId' => $categoryId,
            ]);
        } else {
            return back();
        }
    }
}
