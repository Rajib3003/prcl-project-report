<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create(['name' => 'Project Alpha', 'status' => 'active']);
        Project::create(['name' => 'Project Beta', 'status' => 'inactive']);
        Project::create(['name' => 'Project Gamma', 'status' => 'active']);
    }
}
