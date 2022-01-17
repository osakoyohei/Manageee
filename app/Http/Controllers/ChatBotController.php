<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatBotController extends Controller
{
    /**
     * ラインチャットボット追加ページを表示する。
     * 
     * @return view  
     */
    public function index()
    {
        return view('line.chatbot');
    }
}
