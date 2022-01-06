<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AccountEmailRequest;
use App\Http\Requests\AccountPasswordRequest;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * アカウントページを表示する。
     * 
     * @return view  
     */
    public function index()
    {
        return view('user-information.account');
    }

    /**
     * メールアドレスを変更する。
     * 
     * @param AccountEmailRequest $request
     * @return view
     */
    public function emailUpdate(AccountEmailRequest $request)
    {
        if (Hash::check($request->password, Auth::user()->password)) {
            \DB::beginTransaction();
            try {
                $account = User::find(Auth::id());
                $account->fill([
                    'email' => $request->email,
                ]);
                $account->save();
                \DB::commit();
            } catch(\Throwable $e) {
                \DB::rollback();
                abort(500);
            }
            
            return back()->with('success', 'メールアドレスを変更しました！');

        } else {
            return back()->with('password', 'パスワードが間違っています。');
        }
    }

    /**
     * パスワードを変更する。
     * 
     * @param AccountPasswordRequest $request
     * @return view
     */
    public function passwordUpdate(AccountPasswordRequest $request)
    {
        if (Hash::check($request->currentPassword, Auth::user()->password)) {
            \DB::beginTransaction();
            try {
                $account = User::find(Auth::id());
                $account->fill([
                    'password' => Hash::make($request->newPassword),
                ]);
                $account->save();
                \DB::commit();
            } catch(\Throwable $e) {
                \DB::rollback();
                abort(500);
            }
            
            return back()->with('success', 'パスワードを変更しました！');

        } else {
            return back()->with('currentPassword', '現在のパスワードが間違っています。');
        }
    }
}
