<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AccountRequest;

class AccountController extends Controller
{
    /**
     * アカウントページを表示する。
     * 
     * @return view  
     */
    public function index()
    {
        return view('user.account');
    }

    /**
     * アカウントを編集する。
     * 
     * @param AccountRequest $request
     * @return view
     */
    public function update(AccountRequest $request)
    {
        $inputs = $request->all();
        
        \DB::beginTransaction();
        try {
            $account = User::find(Auth::id());
            $account->fill([
                'email' => $inputs['email'],
            ]);
            $account->save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        
        return back()->with('success', 'アカウントを保存しました！');
    }
}
