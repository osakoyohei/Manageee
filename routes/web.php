<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AccountController;

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

//トップページ
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['guest']], function() {
    // ログインフォームを表示する
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login.show');
    // ログイン処理
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    // ゲストユーザーログイン
    Route::get('/login/guest', [LoginController::class, 'guestLogin'])->name('login.guest');

    // 新規登録画面を表示する
    Route::get('/register', [RegisterController::class, 'showRegister'])->name('register.show');
    // 新規登録処理
    Route::post('/register', [RegisterController::class, 'register'])->name('register');
    
    // パスワード再設定メールアドレス入力フォームを表示する
    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    // パスワード再設定メール送信
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    // パスワードリセット入力フォーム表示
    Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    // パスワードリセット
    Route::post('/password/reset', [ResetPasswordController::class, 'resetPassword'])->name('password.update');
});

Route::group(['middleware' => ['auth']], function() {

    // ユーザープロフィール画面を表示
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    // ユーザープロフィール情報の編集
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // ユーザーアカウント画面を表示
    Route::get('/account', [AccountController::class, 'index'])->name('account.index');
    // ユーザープロフィール情報の編集
    Route::post('/account/update', [AccountController::class, 'update'])->name('account.update');
    
    // ログアウト処理
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    // ToDoリスト画面を表示する
    Route::get('/todo/index', [TodoController::class, 'index'])->name('todo.index');
    // ToDo登録画面を表示する
    Route::get('/todo/create', [TodoController::class, 'create'])->name('todo.create');
    // ToDo登録
    Route::post('/todo/store', [TodoController::class, 'store'])->name('todo.store');
    // ToDo詳細画面を表示
    Route::get('/todo/{id}', [TodoController::class, 'show'])->name('todo.show');
    // ToDoの編集画面を表示
    Route::get('/todo/edit/{id}', [TodoController::class, 'edit'])->name('todo.edit');
    // ToDo編集
    Route::post('/todo/update', [TodoController::class, 'update'])->name('todo.update');
    // ToDo削除
    Route::post('/todo/delete/{id}', [TodoController::class, 'delete'])->name('todo.delete');
    //ToDo完了
    Route::post('/todo/done/{id}', [TodoController::class, 'done'])->name('todo.done');
});