<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

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
    Route::get('/show/login', [LoginController::class, 'showLogin'])->name('login.show');

    //ログイン処理
    Route::post('/login', [LoginController::class, 'login'])->name('login');

    //新規登録画面
    Route::get('/show/register', [RegisterController::class, 'showRegister'])->name('register.show');

    //新規登録処理
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
});

Route::group(['middleware' => ['auth']], function() {
    //ToDoリスト画面を表示
    Route::get('todo_list', [TodoController::class, 'showList'])->name('todos');
    
    //ログアウト
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

//トップページ
Route::get('/', [TodoController::class, 'index'])->name('index');

//ゲストユーザーログイン
Route::get('/login/guest', [LoginController::class, 'guestLogin'])->name('login.guest');

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

//ToDo完了
Route::post('/todo/Done/{id}', [TodoController::class, 'exeDone'])->name('done');

//ToDo削除
Route::post('/todo/delete/{id}', [TodoController::class, 'exeDelete'])->name('delete');


//パスワード再設定メールアドレス入力フォーム表示
Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

//パスワード再設定メール送信
Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

//パスワードリセット入力フォーム表示
Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

//パスワードリセット
Route::post('/password/reset', [ResetPasswordController::class, 'resetPassword'])->name('password.update');