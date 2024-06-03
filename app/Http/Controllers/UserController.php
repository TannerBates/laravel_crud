<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Users;
use App\Models\Edit;
use App\Models\Post;

class UserController extends Controller
{


    public function Index() {
        $users = Users::all();
        $posts = Post::all();
        return view('admin.index', compact(['users', 'posts']));
    }


    public function AddUser(Request $request) {
        $validateData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required'
        ]);

        $user = new Users();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->save();

        $user = $request->all();

        return redirect()->back()->with('success', 'New User Successfully Added');
    }

    
    public function UpdateUser($id) {
        $users = Users::find($id);
        return view('admin.useredit', compact('users'));
    }


    public function EditUser(Request $request, $id) {
        $edit = Users::find($id);

        $edit->first_name = $request->input('first_name');
        $edit->last_name = $request->input('last_name');
        $edit->username = $request->input('username');
        $edit->save();

        $edit = $request->all();

        return redirect()->route('all.users')->with('success', 'User Successfully Edited');
    }

}
