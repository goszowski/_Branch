<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Friend;

class FriendsTableSeeder extends Seeder
{
    protected $userdIds = [];
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        for($i=1; $i<=100; $i++)
        {
          $this->userdIds = [];
          $user = User::find($i);
          
          for($a=0; $a<60; $a++)
          {
            $randomFriend = User::whereNotIn('id', $this->userdIds)->inRandomOrder()->first();
            $this->userdIds[] = $randomFriend->id;
            Friend::create([
                'user_id' => $user->id,
                'friend_id' => $randomFriend->id,
                'is_accepted' => true,
            ]);
          }
        }
        
    }
}
