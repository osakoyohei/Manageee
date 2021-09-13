<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * ログインフォームを表示する。
     * 
     * @return View
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * ログイン処理。
     * 
     * @param LoginRequest $request
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        //アカウントがロックされていたら弾く
        $user = User::where('email', '=', $credentials['email'])->first();

        if (!is_null($user)) {
            if ($user->locked_flg === 1) {
                return back()->withErrors([
                    'danger' => 'アカウントがロックされています！',
                ]);
            }

            if (Auth::attempt($credentials)) {
                //ログイン成功したら、エラーカウントを0にする
                $request->session()->regenerate();
                if($user->error_count > 0) {
                    $user->error_count = 0;
                    $user->save();
                }
                
                return redirect(route('todos'))->with('success', 'ログインに成功しました！');
            }    

            //ログイン失敗したらエラーカウントを1増やす
            $user->error_count = $user->error_count + 1;

            //エラーカウントが6以上の場合は、アカウントをロックする
            if ($user->error_count > 5) {
                $user->locked_flg = 1;
                $user->save();
                return back()->withErrors([
                    'danger' => 'アカウントがロックされました！',
                ]);
            }
            $user->save();
        }

        return back()->withErrors([
            'danger' => 'メールアドレスまたはパスワードが不正です。',
        ]);
    }

    /**
     * ログアウト処理。
     *
     * @param  Request $request
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('home'))->with('danger', 'ログアウトしました！');
    }

    /**
     * ゲストログイン
     */
    public function guestLogin()
    {
        $email = 'guest@guest.jp';
        $password = 'password';

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect(route('todo.index'))->with('success', 'ゲストログインに成功しました！');
        }

        return redirect(route('login.show'));
    }
}