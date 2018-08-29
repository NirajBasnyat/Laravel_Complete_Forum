<?php

use Illuminate\Database\Seeder;
use App\Discussion;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = 'Implementing Ouath using laravel error';
        $t2 = 'Pagination in vuejs not working';
        $t3 = 'Defaultstringproblem in laravel';
        $t4 = 'session not working in codeigniter';
        $t5 = 'css not compiling';

        $d1 = [
        	'title' => $t1,
        	'content' => ' Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati et veniam ipsam quo placeat perspiciatis natus porro distinctio beatae ullam totam amet provident fuga quis, consectetur consequatur eum hic est.',

        	'channel_id' => 1,
        	'user_id' => 2,
        	'slug' => str_slug($t1)
        ];

        $d2 = [
        	'title' => $t2,
        	'content' => 'consectetur adipisicing elit. Dignissimos, numquam, itaque excepturi blanditiis voluptatem distinctio eius ratione sequi totam a.',
        	'channel_id' => 2,
        	'user_id' => 1,
        	'slug' => str_slug($t2)
        ];

        $d3 = [
        	'title' => $t3,
        	'content' => 'bbLorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, numquam, itaque excepturi blanditiis voluptatem distinctio eius ratione sequi totam a.',
        	'channel_id' => 3,
        	'user_id' => 2,
        	'slug' => str_slug($t3)
        ];

        $d4 = [
        	'title' => $t4,
        	'content' => 'ccrem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, numquam, itaque excepturi blanditiis voluptatem distinctio eius ratione sequi totam a.jalfa',
        	'channel_id' => 3,
        	'user_id' => 1,
        	'slug' => str_slug($t4)
        ];
        $d5 = [
        	'title' => $t5,
        	'content' => 'aLorem ipsum dolor sit amet, mquam, itaque excepturi blanditiis voluptatem distinctio eius ratione sequi totam a.alfa',
        	'channel_id' => 4,
        	'user_id' => 2,
        	'slug' => str_slug($t5)
        ];

        Discussion::create($d1);
        Discussion::create($d2);
        Discussion::create($d3);
        Discussion::create($d4);
        Discussion::create($d5);
    }
}
