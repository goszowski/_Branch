<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Auth;

class CommentController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $data = $this->validate($request, [
            'comment_id' => 'nullable|integer|exists:comments,id',
            'reply_to_user_id' => 'nullable|integer|exists:users,id',
            'text' => 'required|string|max:512',
        ]);

        $data['user_id'] = Auth::id();
        $data['post_id'] = $post->id;

        $comment = Comment::create($data);

        return redirect()->route('post', $post);
    }
}
