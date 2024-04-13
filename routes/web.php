<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('posts');
});

Route::get('/tags',             [TagController::class, 'index' ]);
Route::get('/tag/{id}',         [TagController::class, 'show'  ]);
Route::get('/tag/{id}/create',  [TagController::class, 'create'])->middleware('auth');
Route::post('/tag/{id}/store',  [TagController::class, 'store' ])->middleware('auth');

Route::get('/users',            [UserController::class, 'index'  ]);
Route::get('/user/create',      [UserController::class, 'create' ]);
Route::post('/user/store',      [UserController::class, 'store'  ]);
Route::get('/user/{id}',        [UserController::class, 'show'   ]);
Route::get('/user/{id}',        [UserController::class, 'show'   ]);
Route::get('/user/{id}/edit',   [UserController::class, 'edit'   ]);
Route::post('/user/{id}/update',[UserController::class, 'update' ]);
Route::get('/user/{id}/destroy',[UserController::class, 'destroy']);

Route::get('/posts',            [PostController::class, 'index'  ]);
Route::get('/post/create',      [PostController::class, 'create' ])->middleware('auth');
Route::post('/post/store',      [PostController::class, 'store'  ])->middleware('auth');
Route::get('/post/{id}',        [PostController::class, 'show'   ]);
Route::get('/post/{id}/edit',   [PostController::class, 'edit'   ])->middleware('auth');
Route::post('/post/{id}/update',[PostController::class, 'update' ])->middleware('auth');
Route::get('/post/{id}/destroy',[PostController::class, 'destroy'])->middleware('auth');

Route::get('/post/{id}/comments',                       [CommentController::class, 'index'  ]);
Route::get('/post/{id}/comment/create',                 [CommentController::class, 'create' ])->middleware('auth');
Route::post('/post/{id}/comment/store',                 [CommentController::class, 'store'  ])->middleware('auth');
Route::get('/post/{id}/comment/{id_comment}/edit',      [CommentController::class, 'edit'   ])->middleware('auth');
Route::post('/post/{id}/comment/{id_comment}/update',   [CommentController::class, 'update' ])->middleware('auth');
Route::get('/post/{id}/comment/{id_comment}/destroy',   [CommentController::class, 'destroy'])->middleware('auth');

Route::get('/login',  [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/auth',  [LoginController::class, 'authenticate'])->name('auth');

Route::get('/error', function () {
    return view('error', ['message' => session('message')]);
});