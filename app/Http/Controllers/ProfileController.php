<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    /**
     * プロフィールページを表示する。
     * 
     * @return view  
     */
    public function index()
    {
        return view('user.profile');
    }

    /**
     * プロフィールを編集する。
     * 
     * @param ProfileRequest $request
     * @return view
     */
    public function update(ProfileRequest $request)
    {
        $inputs = $request->all();
        
        \DB::beginTransaction();
        try {
            $profile = User::find(Auth::id());
            $profile->fill([
                'name' => $inputs['name'],
            ]);
            $profile->save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        
        return back()->with('success', 'プロフィールを保存しました！');
    }
}