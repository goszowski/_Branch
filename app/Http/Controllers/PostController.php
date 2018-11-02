<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Auth;

class PostController extends Controller
{
    public function show(Post $post, Comment $comment)
    {
        $comments = $post->comments;
        return view('post.show', compact('post', 'comments', 'comment'));
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

    public function delete(Post $post)
    {
        if($post->user_id != Auth::id())
        {
            return abort(403, 'Unauthorized action.');
        }

        $post->delete();

        return redirect()->back();
    }
}
