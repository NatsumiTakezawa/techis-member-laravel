<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// top画面のルーティング。'/members/top'にアクセスすると、MemberControllerの'top'メソッドが実行され、特定の処理や画面を表示する。このルートには名前を'members.top'とつけている
Route::get('/members/top' , [App\Http\Controllers\MemberController::class, 'top'])->name('members.top');

// 登録画面のルーティング。このルート定義により、'/members/register'にGETリクエストがあった場合には会員登録フォームが表示され、'/members/top'にPOSTリクエストがあった場合には会員登録フォームのデータが送信され、MemberControllerの'postRegister'メソッドが実行される
Route::get('/members/register' , [App\Http\Controllers\MemberController::class, 'register'])->name('members.register');
Route::post('/members/top', [App\Http\Controllers\MemberController::class, 'postRegister'])->name('members.top');

// 編集画面のルーティング。post通信ではrequestからidを受け取るので{id}の指定はいらないedit.bladeの17行目name=idから値をとってこれる
Route::get('/members/edit/{id}' , [App\Http\Controllers\MemberController::class, 'edit'])->name('members.edit');
Route::post('/members/update' , [App\Http\Controllers\MemberController::class, 'postEdit'])->name('members.update');

// 削除のルーティング
Route::delete('/members/destroy', [App\Http\Controllers\MemberController::class, 'destroy'])->name('members.destroy');
// Route::resource('/members/top', App\Http\Controllers\MemberController::class)->names('members')->parameters([ 'top' => 'member']);