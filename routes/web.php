<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

//ToDoリスト画面を表示
Route::get('/', [TodoController::class,'showList'])->name('todos');

//ToDo登録画面を表示
Route::get('/todo/create', [TodoController::class,'showCreate'])->name('create');

//ToDo登録
Route::post('/todo/store', [TodoController::class,'exeStore'])->name('store');

//ToDo詳細画面を表示
Route::get('/todo/{id}', [TodoController::class,'showDetail'])->name('show');

//ToDoの編集画面を表示
Route::get('/todo/edit/{id}', [TodoController::class,'showEdit'])->name('edit');

//ToDo編集
Route::post('/todo/update', [TodoController::class,'exeUpdate'])->name('update');

//ToDo削除
Route::post('/todo/delete/{id}', [TodoController::class,'exeDelete'])->name('delete');
