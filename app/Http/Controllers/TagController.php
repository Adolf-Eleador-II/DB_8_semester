<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return view('tag/tags_index', [
            'tags' => Tag::all()
        ]);
    }

    public function show(string $id)
    {
        return view('tag/tag_show', [
            'tag' => Tag::all()->where('id',$id)->first()
        ]);
    }

    public function create()
    {
        return view('tag/tag_create');
    }

    public function store(Request $request)
    {
        $valideted = $request->validate([
            'name' => 'required'
        ]);

        $tag=new Tag();
        $tag->name=$valideted['name'];
        if($valideted['id_parent']) $tag->id_parent=$valideted['id_parent'];
        $tag->save();

        return redirect('/posts');
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
