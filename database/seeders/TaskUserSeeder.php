<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_user')->insert([
            ['task_id' => 1, 'user_id' => 1],
            ['task_id' => 2, 'user_id' => 1],
            ['task_id' => 3, 'user_id' => 2],
            ['task_id' => 4, 'user_id' => 2],
            ['task_id' => 5, 'user_id' => 1],
            ['task_id' => 6, 'user_id' => 2],
            ['task_id' => 7, 'user_id' => 1],
            ['task_id' => 8, 'user_id' => 2],
            ['task_id' => 9, 'user_id' => 1],
        ]);
    }
}
