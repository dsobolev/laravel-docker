<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetController extends Controller
{
    public function single($slug)
    {
        $tweet = Tweet::where('slug', $slug)->firstOrFail();

        return view('tweet', [
            'tweet' => $tweet
        ]);
    }

    public function all()
    {    
        return view('tweets', [
            'tweets' => Tweet::latest()->get()
        ]);
    }
}
