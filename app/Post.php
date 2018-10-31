<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like\PostLike;
use Auth;
use Misd\Linkify\Linkify;
use Purifier;

class Post extends Model
{
    protected $linkify;
    
    protected $objectCache = [
        'likes_amount' => null,
        'comments_amount' => null,
        'auth_user_like_it' => null,
        'auth_user_is_owner' => false,
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

    public function __construct(array $attributes = array())
    {
        $this->linkify = new Linkify([
            'attr' => [
                'rel'=>'nofollow', 
                'target'=>'_blank',
            ]
        ]);

        parent::__construct($attributes);
    }

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

    public function getAuthUserLikeItAttribute()
    {
        if($this->objectCache['auth_user_like_it'] === null)
        {
            $this->objectCache['auth_user_like_it'] = PostLike::where('post_id', $this->id)->where('user_id', Auth::id())->exists();
        }

        return $this->objectCache['auth_user_like_it'];
    }

    public function getAuthUserIsOwnerAttribute()
    {
        if($this->objectCache['auth_user_is_owner'] === null)
        {
            $this->objectCache['auth_user_is_owner'] = ($this->user_id == Auth::id());
        }

        return $this->objectCache['auth_user_is_owner'];
    }

    public function getTextForDisplayAttribute()
    {
        // Detecting links and replacing with <a> tag.
        // Clearning all other tags
        return nl2br(Purifier::clean($this->linkify->process($this->text)));
    }
}
