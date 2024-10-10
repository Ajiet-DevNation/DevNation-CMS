<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\College;
use App\Models\Role;
use App\Models\User;
use App\Models\Events;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       

        College::factory()->create([
            'name' => 'College of Engineering, Pune',
            'city' => 'Pune',
            'state' => 'Maharashtra',
            'country' => 'India',
        ]);

        Branch::factory()->create([
            'name' => 'Computer Science',
            'slug' => 'CS',
        ]);

        Role::factory()->create([
            'name' => 'coordianator',
        ]);

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'is_admin' => true,
            'is_verified' => true,
            'is_alumini' => false,
            'branch_id' => Branch::first()->id,
            'college_id' => College::first()->id,
            'role_id' => Role::first()->id,
            'usn' => '4JK21CS016',
            'semester' => '5',
            'phone' => '1234567890',
        ]);

        Events::factory(10)->create();
        User::factory(10)->create();
    }
}
