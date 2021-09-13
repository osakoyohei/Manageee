<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * トップページを表示する。
     * 
     * @return View
     */
    public function index()
    {
        return view('home');
    }
}
