<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatBotController extends Controller
{
    /**
     * 勉強時間計測ボットお友達追加画面を表示する。
     * 
     * @return view  
     */
    public function index()
    {
        return view('line.study-time-chatbot');
    }
}
