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

// top画面のルーティング。'/members/index'にアクセスすると、MemberControllerの'index'メソッドが実行され、特定の処理や画面を表示する。このルートには名前を'members.top'とつけている
Route::get('/members/index' , [App\Http\Controllers\MemberController::class, 'index'])->name('members.index');

// 登録画面のルーティング。このルート定義により、'/members/create'にGETリクエストがあった場合には会員登録フォームが表示され、'/members/index'にPOSTリクエストがあった場合には会員登録フォームのデータが送信され、MemberControllerの'store'メソッドが実行される
Route::get('/members/create' , [App\Http\Controllers\MemberController::class, 'create'])->name('members.create');
Route::post('/members/index', [App\Http\Controllers\MemberController::class, 'store'])->name('members.index');


// 編集画面のルーティング。post通信ではrequestからidを受け取るので{id}の指定はいらないedit.bladeの17行目name=idから値をとってこれる.url(左側)だと{id}をつけていいが、route nameのところ（右側）には通常{id}をつけてはだめ
Route::get('/members/edit/{id}' , [App\Http\Controllers\MemberController::class, 'edit'])->name('members.edit');
Route::post('/members/update' , [App\Http\Controllers\MemberController::class, 'update'])->name('members.update');

// 削除のルーティング
Route::delete('/members/destroy', [App\Http\Controllers\MemberController::class, 'destroy'])->name('members.destroy');
// Route::resource('/members/top', App\Http\Controllers\MemberController::class)->names('members')->parameters([ 'top' => 'member']);