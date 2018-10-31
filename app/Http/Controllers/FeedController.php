<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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
        // The friends list is cached for one minute to reduce the load on the feed page.
        $this->friends = Cache::remember('friends_list_of_user_'.Auth::id(), 1, function() {
            return Friend::where('user_id', Auth::id())->get()->pluck('friend_id');
        });

        $posts = Post::where('user_id', Auth::id())
        ->orWhereIn('user_id', $this->friends)
        ->with('comments')
        ->orderBy('created_at', 'desc')
        ->orderBy('popularity', 'desc')
        ->paginate(30);

        return view('feed.index', compact('posts'));
    }
}
