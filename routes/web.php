<?php

use App\Models\Post;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/insert', function () {
    // $user = new User();
    // $user->name = "One One";
    // $user->email = "one@one.com";
    // $user->password = Hash::make('1123');

    // $user->save();
    $pass = Hash::make('3456');
    \App\Models\User::create(['name' => 'Cho Two', 'email' => 'cho@two.com', 'password' => $pass]);
});

Route::get('/posts/{id}/show', function ($id) {
    $post = Post::find($id);
    echo $post->title . "<br>";

    return $post->user->name;
});

Route::get('/post/insert', function () {
    Post::create(['user_id' => '2', 'title' => 'Testing', 'content' => 'Hello Testing!']);
});