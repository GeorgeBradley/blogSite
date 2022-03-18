<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    public function index()
    {
       // $posts = Post::get(); //all

       $posts = Post::paginate(2);
        return view('posts.index', [
            'posts' => $posts

        ]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->posts()->create([
            'body'=> $request->body
        ]);

        return back();
        //another way of doing the above
        //$request->user()->posts()->create($request->only('body'));
       
    }
}
