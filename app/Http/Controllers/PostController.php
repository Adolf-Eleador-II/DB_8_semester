<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $perpage = $request->perpage??5;
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
        $post->id_user=0; // пока нет авторизации
        $post->save();

        return redirect('/post/'.$post->id);
    }

    public function edit(string $id)
    {
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
        if(!Gate::allows('destroy-post', Post::all()->where('id',$id)->first())){
            return redirect('/error')->with('message', 'Вы не можете удалить чужой пост');
        }
        Post::destroy($id);
        return redirect('/posts');
    }
}
