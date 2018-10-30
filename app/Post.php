<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like\PostLike;

class Post extends Model
{
    protected $objectCache = [
        'likes_amount' => null,
        'comments_amount' => null,
    ];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'text', 'popularity',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getLikesAmountAttribute()
    {
        if($this->objectCache['likes_amount'] === null)
        {
          $this->objectCache['likes_amount'] = PostLike::where('post_id', $this->id)->count();
        }

        return $this->objectCache['likes_amount'];
    }

    public function getCommentsAmountAttribute()
    {
        if($this->objectCache['comments_amount'] === null)
        {
          $this->objectCache['comments_amount'] = Comment::where('post_id', $this->id)->count();
        }

        return $this->objectCache['comments_amount'];
    }

    public function getPopularPartOfCommentsAttribute()
    {
        return $this->comments()->take(3)->get();
    }
}
