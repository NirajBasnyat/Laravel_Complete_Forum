<?php

use Illuminate\Database\Seeder;
use App\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title' => 'Laravel','slug' => str_slug('Laravel')];
        $channel2 = ['title' => 'Vuejs','slug' => str_slug('Vuejs')];
        $channel3 = ['title' => 'Css','slug' => str_slug('Css')];
        $channel4 = ['title' => 'JavaScript','slug' => str_slug('JavaScript')];
        $channel5 = ['title' => 'Codeigniter','slug' => str_slug('Codeigniter')];

        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);


    }
}
