<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $comments = $post->comments;
        return view('post.show', compact('post', 'comments'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'text' => 'required|string|max:1024',
        ]);

        $post = Post::create([
            'user_id' => Auth::id(),
            'text' => $request->text,
        ]);

        return redirect('/');
    }
}
