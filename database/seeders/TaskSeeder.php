<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // Project 1 Tasks
        Task::create(['project_id' => 1, 'title' => 'Task 1', 'is_completed' => true]);
        Task::create(['project_id' => 1, 'title' => 'Task 2', 'is_completed' => false]);
        Task::create(['project_id' => 1, 'title' => 'Task 3', 'is_completed' => true]);
        Task::create(['project_id' => 1, 'title' => 'Task 4', 'is_completed' => false]);
        Task::create(['project_id' => 1, 'title' => 'Task 5', 'is_completed' => true]);

        // Project 2 Tasks
        Task::create(['project_id' => 2, 'title' => 'Task A', 'is_completed' => false]);
        Task::create(['project_id' => 2, 'title' => 'Task B', 'is_completed' => false]);

        // Project 3 Tasks
        Task::create(['project_id' => 3, 'title' => 'Task X', 'is_completed' => true]);
        Task::create(['project_id' => 3, 'title' => 'Task Y', 'is_completed' => true]);
        Task::create(['project_id' => 3, 'title' => 'Task Z', 'is_completed' => false]);
    }
}
