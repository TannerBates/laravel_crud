<?php

use Illuminate\Support\Facades\Route;
use App\Models\Users;
use App\Models\Delete;
use App\Models\Edit;
use App\Models\Post;

use App\Http\Controllers\UserController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('admin.login');
});

Route::get('/dashboard', function () {
    $users = Users::all();
    $posts = Post::all();
    return view('view.index', compact('users'));
})->name('dashboard');


// GET THE USERS
Route::get('/dashboard', [UserController::class, 'Index'])->name('all.users');
Route::post('/user/add', [UserController::class, 'AddUser'])->name('add.users');
Route::get('/user/edit/{id}', [UserController::class, 'UpdateUser'])->name('edit.user');
Route::post('/user/update/{id}', [UserController::class, 'EditUser'])->name('update.user');


// DELETE THE USER
Route::get('/user/softdelete/{id}', [DeleteController::class, 'SoftDelete'])->name('remove.user');



// CREATE POST

Route::post('/post/add', [PostController::class, 'AddPost'])->name('add.post');
Route::get('/post/edit/{id}', [PostController::class, 'EditPost'])->name('edit.post');
Route::post('/post/update/{id}', [PostController::class, 'UpdatePost'])->name('post.update');
Route::get('post/softdelete/{id}', [PostController::class, 'DeletePost'])->name('remove.post');