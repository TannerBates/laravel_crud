<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Edit;

class EditController extends Controller
{
    public function Edit($id) {
        $user['userData'] = Users::all();

        return view('dashboard', compact('users'));
    }

    public function UserDetail($id) {
        return User::findOrFail($id);
    }


    public function EditUser(Request $request, $id) {
        $edit = new Edit();
        $edit = User::find($id);
        $edit->first_name = $request->first_name;
        $edit->last_name = $request->last_name;
        $edit->username = $request->username;
        $edit->save();

        $user = $request->all();


        return redirect()->route('admin.index')->with('success', 'User Successfully Edited');
    }
}
