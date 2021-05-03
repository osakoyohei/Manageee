<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
    * @return View
    */
    public function showRegister()
    {
        return view('login.register_form');
    }

    /**
     * 新規登録する
     * 
     * @return view  
     *
     */
    public function register(RegisterFormRequest $request)
    {
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
