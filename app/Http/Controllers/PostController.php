<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{

    public function __construct(){
        $this->middleware(['auth'])->only('store', 'destroy');
    }
    public function index()
    {
       // $posts = Post::get(); //all

       //$posts = Post::orderBy('created_at', 'desc')->with(['user','likes'])->paginate(2);
       $posts = Post::latest()->with(['user','likes'])->paginate(2);

       return view('posts.index', [
            'posts' => $posts

        ]);
    }


    public function show(Post $post){
        return view('posts.show',[
            'post' => $post
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

    public function destroy(Post $post){
       
        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }
}
