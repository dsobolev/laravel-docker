<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function all()
    {
        
        return view('posts.all', [
            'posts' => Post::latest()->get()
        ]);
    }

    public function single($id)
    {
        $post = Post::find($id);

        return view('posts.single', [
            'post' => $post
        ]);
    }
}
