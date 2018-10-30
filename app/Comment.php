<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['post_id', 'user_id', 'text', 'comment_id', 'reply_to_user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hasResponses()
    {
        return $this->responses()->exists();
    }

    public function responses()
    {
        return $this->hasMany(Comment::class, 'comment_id');
    }

    public function getPopularPartOfResponsesAttribute()
    {
        return $this->responses()->take(3)->get();
    }
}
