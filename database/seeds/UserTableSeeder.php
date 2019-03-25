<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_data = [ 
            'name' => 'hal822＠英語',
            'nickname' => 'hal822tw',
            'twitter_id' => '1094474893008072704',
            'avatar' => 'http://pbs.twimg.com/profile_images/1099629947386097664/tiOnxDHz.png'
        ];
        $user = new User;
        $user->fill($user_data);
        
        $user->save();
    }
}
