<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    
    public function GetPost() {
        $posts = Post::all();
        return view('admin.index', compact('posts'));
    }

    public function AddPost(Request $request) {
        $validateData = $request->validate([
            'post' => 'required'
        ]);

        $post = new Post();
        $post->post = $request->post;
        $post->save();

        return redirect()->back()->with('success', 'New Post Added');
    }


    public function EditPost($id) {
        $posts = Post::find($id);
        return view('admin.editpost', compact('posts'));
    }


    public function UpdatePost(Request $request, $id) {
        $update = Post::find($id);

        $update->post = $request->input('post');
        $update->save();
        $update = $request->all();

        return redirect()->route('all.users')->with('success', 'Your Post Has Been Updated');
    }




    public function DeletePost(Request $request, $id) {
        $delete = New Post();

        $delete->post = $request->post;
        $delete = Post::find($request->id)->delete();

        return redirect()->back()->with('success', 'Post Deleted');
    }

}
