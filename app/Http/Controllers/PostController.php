<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $comments = $post->comments;
        return view('post.show', compact('post', 'comments'));
    }
}
