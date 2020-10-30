<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MainController;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get ( '/content/{id}', [App\Http\Controllers\PostController::class, 'index'])->with()
// Route::get ( '/content/{id}', function(App\Models\Post $id) {
//     //
//     // dd($id);
//     return view('post.content',compact('id'));
// });
Route::get('content/{id}', [App\Http\Controllers\HomeController::class, 'show']);
//留言回復
Route::post('reply/{posts_id}/{comments_id}', [App\Http\Controllers\HomeController::class, 'reply']);
//留言
Route::post('comment/{posts_id}', [App\Http\Controllers\HomeController::class, 'comment']);
//去posts一定要有會員登入
Route::resource('/posts',PostController::class)->middleware('auth');

