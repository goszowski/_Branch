<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comments\CommentStoreRequest;
use App\Comment;
use App\Post;
use Auth;

class CommentController extends Controller
{
    public function store(Post $post, CommentStoreRequest $request)
    {
        $data = $request->all();

        $data['user_id'] = Auth::id();
        $data['post_id'] = $post->id;

        $comment = Comment::create($data);

        return redirect()->route('post', $post);
    }
}
