<?php

use Illuminate\Database\Seeder;
use App\Reply;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1 = [
        	'user_id' => 1,
        	'discussion_id' => 1,
        	'content' => 'lorema asdasdk kthos os supposed to be a unseen'
        ];

        $r2 = [
        	'user_id' => 1,
        	'discussion_id' => 2,
        	'content' => 'lorema asdasdk kthos os supposed to be a unseen'
        ];

        $r3 = [
        	'user_id' => 2,
        	'discussion_id' => 3,
        	'content' => 'lorema asdasdk kthos os supposed to be a unseen'
        ];

        $r4 = [
        	'user_id' => 2,
        	'discussion_id' => 4,
        	'content' => 'lorema asdasdk kthos os supposed to be a unseen'
        ];

        $r5 = [
        	'user_id' => 1,
        	'discussion_id' => 5,
        	'content' => 'lorema asdasdk kthos os supposed to be a unseen'
        ];

        Reply::create($r1);
        Reply::create($r2);
        Reply::create($r3);
        Reply::create($r4);
        Reply::create($r5);
    }
}
