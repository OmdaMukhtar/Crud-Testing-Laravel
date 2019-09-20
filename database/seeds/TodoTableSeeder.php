<?php

use Illuminate\Database\Seeder;

class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('todos')->delete();
        \DB::table('todos')->insert(array(
            0 => array(
                'id' => 1,
                'title' => 'Reply to five emials message',
                'done' => 0,
                'user_id' => 1
            ),
            1 => array(
                'id' => 2,
                'title' => 'Writing new Article',
                'done' => 0,
                'user_id' => 1
            ),
            2 => array(
                'id' => 3,
                'title' => 'Reading a post on medium',
                'done' => 1,
                'user_id' => 1
            ),
        ));
    }
}
