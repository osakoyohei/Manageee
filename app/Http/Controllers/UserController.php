<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
     * プロフィールページを表示する。
     * 
     * @return view  
     */
    public function profile()
    {
        return view('user.profile');
    }

    /**
     * アカウントページを表示する。
     * 
     * @return view  
     */
    public function account()
    {
        return view('user.account');
    }
}
