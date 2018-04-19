<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function getPost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('posts.show')->with('post', $post);
    }
}
