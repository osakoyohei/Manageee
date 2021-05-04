<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['guest']], function() {
    //ログインフォーム表示
    Route::get('/', [AuthController::class, 'showLogin'])->name('login.show');

    //ログイン処理
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    //新規登録画面
    Route::get('/show/register', [RegisterController::class, 'showRegister'])->name('register.show');

    //新規登録処理
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
});

Route::group(['middleware' => ['auth']], function() {
    //ToDoリスト画面を表示
    Route::get('todo_list', [TodoController::class, 'showList'])->name('todos');
    
    //ログアウト
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

//ゲストユーザーログイン
Route::get('/login/guest', [AuthController::class, 'guestLogin'])->name('login.guest');

//ToDo登録画面を表示
Route::get('/todo/create', [TodoController::class, 'showCreate'])->name('create');

//ToDo登録
Route::post('/todo/store', [TodoController::class, 'exeStore'])->name('store');

//ToDo詳細画面を表示
Route::get('/todo/{id}', [TodoController::class, 'showDetail'])->name('show');

//ToDoの編集画面を表示
Route::get('/todo/edit/{id}', [TodoController::class, 'showEdit'])->name('edit');

//ToDo編集
Route::post('/todo/update', [TodoController::class, 'exeUpdate'])->name('update');

//ToDo削除
Route::post('/todo/delete/{id}', [TodoController::class, 'exeDelete'])->name('delete');
