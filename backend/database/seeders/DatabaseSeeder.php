<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BirthRecord;
use App\Models\DeathRecord;
use App\Models\Employee;
use App\Models\Feedback;
use App\Models\Notice;
use App\Models\Project;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            VacancySeeder::class
        ]);
        BirthRecord::factory()->count(15)->create();
        DeathRecord::factory()->count(15)->create();
        Employee::factory()->count(15)->create();
        Feedback::factory()->count(15)->create();
        Notice::factory()->count(15)->create();
        Project::factory()->count(15)->create();

    }
}
