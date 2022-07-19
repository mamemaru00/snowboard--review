<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SnowController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::prefix('/dashboard')->group(function () {
//     Route::get('/dashboard', 'SnowController@showDash')->name('snows');
//     return view('dashboard')
//  })->middleware(['auth'])->name('dashboard');

Route::group([ 'prefix' => 'dashboard', 'middleware' => ['auth']], function() {
    Route::get('/', [SnowController::class, 'showDash'])->middleware(['auth'])->name('dashboard');
 });

//  Route::get('/', [SnowController::class, 'showDash'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// 投稿一覧表を表示
// Route::get('/', 'SnowController@showList')->name('snows');
// Route::get('/list', 'SnowController@showList');
Route::get('/', 'SnowController@showDash')->name('snows');
// Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth'])->name('snows');

Route::get('/list', 'SnowController@showList')->name('list');

// 投稿画面表示
Route::get('/snow/create', 'SnowController@showCreate')->name('create');
// 投稿登録
Route::post('/snow/store', 'SnowController@store')->name('store');

// 投稿詳細を表示
Route::get('/snow/{id}', 'SnowController@showDetail')->name('show');

// 投稿編集を表示
Route::get('/snow/edit/{id}', 'SnowController@showEdit')->name('edit');
Route::post('/snow/update', 'SnowController@UpdateSnow')->name('update');

// 投稿削除
Route::post('/snow/delete/{id}', 'SnowController@exeDelete')->name('delete');



