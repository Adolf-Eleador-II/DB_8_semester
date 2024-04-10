<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users_index', [
            'users' => User::all()
        ]);
    }

    public function show(string $id)
    {
        return view('user_show', [
            'user' => User::all()->where('id',$id)->first()   
        ]);
    }

    public function create()
    {
        return view('user_create');
    }

    public function store(Request $request)
    {
        $valideted = $request->validate([
            'name' => 'required',
            'email' => 'required',
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
        return view('user_edit',[
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
        // logout
        User::destroy($id);
        return redirect('/');
    }
}
