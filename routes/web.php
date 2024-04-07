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



Route::get('/users',     [UserController::class,    'index']);
Route::get('/user/{id}', [UserController::class,    'show' ]);
Route::get('/tags',      [TagController::class,     'index']);
Route::get('/tag/{id}',  [TagController::class,     'show' ]);
Route::get('/posts',     [PostController::class,    'index']);
Route::get('/post/{id}', [PostController::class,    'show' ]);
Route::get('/post/{id}/comments',  [CommentController::class, 'index']);



// Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
// Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

// Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
// Route::get('/comments/{id}', [CommentController::class, 'show'])->name('comments.show');

// Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
// Route::get('/tags/{id}', [TagController::class, 'show'])->name('tags.show');
