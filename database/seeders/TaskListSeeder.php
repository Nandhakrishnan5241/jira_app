<?php

namespace Database\Seeders;

use App\Models\Tasklist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tasklist::create([
            'tasks' => 'Create Login Form',
        ]);
        Tasklist::create([
            'tasks' => 'Integrate with office API',
        ]);
        Tasklist::create([
            'tasks' => 'Create Forgot Login Form',
        ]);
        
    }
}
