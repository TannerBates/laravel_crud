<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Delete;

class DeleteController extends Controller
{
    public function Delete($id) {
        $user['userData'] = Users::all();
        $delete = Users::onlyTrashed()->get();
        return view('dashboard', compact('users'));
    }


    public function SoftDelete(Request $request, $id) {
        $delete = new Delete();

        $delete->first_name = $request->first_name;
        $delete->last_name = $request->last_name;
        $delete->username = $request->username;

        $delete = Users::find($request->id)->delete();

        return redirect()->back()->with('success', 'User Successfully Deleted');
    }
}
