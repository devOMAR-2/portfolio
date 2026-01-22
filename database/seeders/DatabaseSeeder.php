<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Omar Alfarraj',
            'email' => 'omar.alfarraj@yahoo.com',
        ]);
        Project::factory(5)->create();
        Message::factory(20)->create();
    }
}
