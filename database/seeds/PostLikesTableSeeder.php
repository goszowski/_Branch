<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;
use App\Like\PostLike;

class PostLikesTableSeeder extends Seeder
{
    protected $user_ids = [];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach(Post::get() as $post)
        {
            $this->user_ids = [];

            for($i=0; $i<mt_rand(8, 18); $i++)
            {
                $user = User::whereNotIn('id', $this->user_ids)->inRandomOrder()->first();
                if($user)
                {
                  $this->user_ids[] = $user->id;

                  PostLike::create([
                      'post_id' => $post->id,
                      'user_id' => $user->id,
                  ]);
                }
            }
        }
    }
}
