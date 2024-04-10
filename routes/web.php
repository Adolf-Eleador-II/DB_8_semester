<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
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
Route::get('/tags',             [TagController::class, 'index' ]);
Route::get('/tag/{id}',         [TagController::class, 'show'  ]);
Route::get('/tag/{id}/create',  [TagController::class, 'create']);
Route::post('/tag/{id}/store',  [TagController::class, 'store' ]);

Route::get('/users',            [UserController::class, 'index'  ]);
Route::get('/user/create',      [UserController::class, 'create' ]);
Route::post('/user/store',      [UserController::class, 'store'  ]);
Route::get('/user/{id}',        [UserController::class, 'show'   ]);
Route::get('/user/{id}',        [UserController::class, 'show'   ]);
Route::get('/user/{id}/edit',   [UserController::class, 'edit'   ]);
Route::post('/user/{id}/update',[UserController::class, 'update' ]);
Route::get('/user/{id}/destroy',[UserController::class, 'destroy']);


Route::get('/posts',            [PostController::class, 'index'  ]);
Route::get('/post/create',      [PostController::class, 'create' ]);
Route::post('/post/store',      [PostController::class, 'store'  ]);
Route::get('/post/{id}',        [PostController::class, 'show'   ]);
Route::get('/post/{id}/edit',   [PostController::class, 'edit'   ]);
Route::post('/post/{id}/update',[PostController::class, 'update' ]);
Route::get('/post/{id}/destroy',[PostController::class, 'destroy']);

Route::get('/post/{id}/comments',                       [CommentController::class, 'index'  ]);
Route::get('/post/{id}/comment/create',                 [CommentController::class, 'create' ]);
Route::post('/post/{id}/comment/store',                 [CommentController::class, 'store'  ]);
Route::get('/post/{id}/comment/{id_comment}/edit',      [CommentController::class, 'edit'   ]);
Route::post('/post/{id}/comment/{id_comment}/update',   [CommentController::class, 'update' ]);
Route::get('/post/{id}/comment/{id_comment}/destroy',   [CommentController::class, 'destroy']);
