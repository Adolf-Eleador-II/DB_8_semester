<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $perpage = $request->perpage??10;
        return view('post/posts_index', [
            'posts' => Post::paginate($perpage)->withQueryString()
        ]);
    }

    public function show(string $id)
    {
        return view('post/post_show', [
            'post' => Post::all()->where('id',$id)->first()
        ]);
    }

    public function create()
    {
        return view('post/post_create');
    }

    public function store(Request $request)
    {
        $valideted = $request->validate([
            'content' => 'required'
        ]);

        $post=new Post();
        $post->content=$valideted['content'];
        $post->id_user=Auth::user()->id;
        $post->save();

        return redirect('/post/'.$post->id);
    }

    public function edit(string $id)
    {
        $post=Post::all()->where('id',$id)->first();
        if(!Gate::allows('change-post', $post)){
            return redirect('/posts')->with('message', 'Вы не можете редактировать чужой пост');
        }
        return view('post/post_edit',[
            'post' => Post::all()->where('id',$id)->first()
        ]);
    }

    public function update(Request $request, string $id)
    {
        $valideted = $request->validate([
            'content' => 'required'
        ]);

        $post=Post::all()->where('id',$id)->first();
        $post->content=$valideted['content'];
        $gg=$post->save();

        return redirect('/post/'.$id);
    }

    public function destroy(string $id)
    {
        $post=Post::all()->where('id',$id)->first();
        if(!Gate::allows('change-post', $post)){
            return redirect('/posts')->with('message', 'Вы не можете удалить чужой пост');
        }
        $post->tags()->detach();
        foreach($post->comments as $comment){
            Comment::destroy($comment->id);
        }
        Post::destroy($id);
        return redirect('/posts')->with('message', 'Пост №'.$id.' был удалён');
    }
}
