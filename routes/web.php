<?php

use App\Models\Post;
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

Route::get('/insert', function () {
    DB::insert('insert into posts (title, content) value (?,?)', ['Testing', 'This content is original as fuck!']);
});

Route::get('/read', function () {
    $result = DB::select('select * from posts');
    $ary = "";
    foreach ($result as $post) {
        $ary .= $post->title . "<br>" . $post->content . "<hr>";
    }
    return $ary;
});

Route::get('/update/', function () {
    DB::update('update posts set title=? where id=?', ['Updated title', 2]);
    return "Updated successfully";
});

Route::get('/delete/{id}', function ($id) {
    DB::delete('delete from posts where id=?', [$id]);
    return "Deleted successfully";
});

Route::get('/getall', function () {
    $posts = Post::all();
    return $posts;
});