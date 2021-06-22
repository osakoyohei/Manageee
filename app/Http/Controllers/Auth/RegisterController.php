<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Register;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
    * @return View
    */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * 新規登録する
     * 
     * @return view  
     *
     */
    public function register(RegisterRequest $request)
    {
        // パスワード一致確認
        if ($request['password'] != $request['password_confirmation']) {
            return back()->withErrors([
                'danger' => 'パスワードが一致しません',
            ]);
        }

        \DB::beginTransaction();
        try {
            Register::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        
        return redirect()->route('login.show')->with('success', '新規登録しました！');
    }
}
