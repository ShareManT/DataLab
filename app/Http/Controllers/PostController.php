<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::where('display','1')->latest('created_at')->get();
        return view('post.index', compact('posts'));
    }

    public function item($id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', compact('post'));
    }

}
