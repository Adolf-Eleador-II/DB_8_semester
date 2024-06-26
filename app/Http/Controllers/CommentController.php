<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function index(string $id_post)
    {
        return view('comment/comments_index', [
            'comments' => Comment::all()->where('id_post',$id_post),
            'id_post' => $id_post
        ]);
    }

    public function show(string $id_post, string $id)
    {
        //
    }

    public function create(string $id_post)
    {
        return view('comment/comment_create',[
            'id_post' => $id_post
        ]);
    }

    public function store(string $id_post, Request $request)
    {
        $valideted = $request->validate([
            'content' => 'required'
        ]);

        $comment=new Comment();
        $comment->content=$valideted['content'];
        $comment->id_user=Auth::user()->id;
        $comment->id_post=$id_post;
        $comment->save();

        return redirect('/post/'.$id_post.'/comments');
    }

    public function edit(string $id_post, string $id)
    {
        $comment=Post::all()->where('id',$id)->first();
        if(!Gate::allows('change-comment', $comment)){
            return redirect('/post/'.$id_post)->with('message', 'Вы не можете редактировать чужой комментарий');
        }
        return view('comment/comment_create',[
            'comment' => Comment::all()->where('id',$id)->first(),
            'id_post' => $id_post
        ]);
    }

    public function update(string $id_post, Request $request, string $id)
    {
        $valideted = $request->validate([
            'content' => 'required'
        ]);
        
        $comment=Comment::all()->where('id',$id)->first();
        $comment->content=$valideted['content'];
        $comment->save();

        return redirect('/post/'.$id_post.'/comments');
    }

    public function destroy(string $id_post, string $id)
    {
        $comment=Post::all()->where('id',$id)->first();
        if(!Gate::allows('change-comment', $comment)){
            return redirect('/post/'.$id_post)->with('message', 'Вы не можете удалить чужой комментарий');
        }
        Comment::destroy($id);
        return redirect('/post/'.$id_post);
    }
}
