<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Friend;
use Auth;

class FeedController extends Controller
{
    private $friends = [];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->friends = Friend::where('user_id', Auth::id())->get()->pluck('friend_id');

        $posts = Post::where('user_id', Auth::id())
        ->orWhereIn('user_id', $this->friends)
        ->orderBy('popularity', 'desc')
        ->paginate(30);

        return view('feed.index', compact('posts'));
    }
}
