<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index()
    {
        return view('user/users_index', [
            'users' => User::all()
        ]);
    }

    public function show(string $id)
    {
        return view('user/user_show', [
            'user' => User::all()->where('id',$id)->first()   
        ]);
    }

    public function create()
    {
        return view('user/user_create');
    }

    public function store(Request $request)
    {
        $valideted = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        $user=new User();
        $user->name=$valideted['name'];
        $user->email=$valideted['email'];
        $user->password=$valideted['password'];
        $user->save();

        return redirect('/user/'.$user->id);
        //login
    }

    public function edit(string $id)
    {
        $user=User::all()->where('id',$id)->first();
        if(!Gate::allows('change-user', $user)){
            return redirect('/users')->with('message', 'Вы не можете редактировать другого пользователя');
        }
        return view('user/user_edit',[
            'user' =>User::all()->where('id',$id)->first()
        ]);
    }

    public function update(Request $request, string $id)
    {
        $valideted = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user=User::all()->where('id',$id)->first();
        $user->name=$valideted['name'];
        $user->email=$valideted['email'];
        $user->password=$valideted['password'];
        $user->save();

        return redirect('/user/'.$user->id);
        //login
    }

    public function destroy(string $id)
    {
        $user=User::all()->where('id',$id)->first();
        if(!Gate::allows('change-user', $user)){
            return redirect('/users')->with('message', 'Вы не можете удалить другого пользователя');
        }
        // foreach($user->posts as $post){
        //     Post::where('id_user',$user->id)->update(['id_user' => 0]);
        // }
        // foreach($user->comments as $comment){
        //     $comment->id_user=0;
        //     Comment::update($comment);
        // }
        // Auth::logout();
        // User::destroy($id);
        return redirect('/posts');
    }
}
