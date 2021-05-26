<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = [];
        if ( request('tag') ) {
            $tag = Tag::where('name', request('tag'))->first();
            if ( !is_null($tag) ) {
                $posts = $tag->posts;
            }
        } else {
            $posts = Post::latest()->get();
        }

        return view('posts.all', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create-post');

        return view('posts.create', [
            'tags' => Tag::all()
         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validatedPost();

        $post = new Post( request(['title', 'content']) );
        $post->user_id = 1;
        $post->save();

        if ( request()->has('tags') ) {
            $post->tags()->attach( request('tags') );
        }
        
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //$post = Post::find($id);

        return view('posts.single', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post/*int $id*/)
    {
        //$post = Post::findOrFail($id);
        
        $this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update( $this->validatedPost() );
        // $post->title = request('title');
        // $post->content = request('content');

        // $post->save();

        return redirect( route('posts.show', $post) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    protected function validatedPost()
    {

        return request()->validate([
            'title' => [
                'required',
                'min:5',
                'max:15'
            ],
            'content' => 'required|min:10',
            'tags' => 'exists:tags,id'
        ]);
    }
}
