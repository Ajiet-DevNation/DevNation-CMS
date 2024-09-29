<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'is_admin' =>true,
            'is_verified' => 1,
            'usn' => '4JK21CS001',
            'semester' => '5',
            'branch' => 'CSE',
            'phone' => '9876543210',
            'role' => 'core_member',
            'image' => 'https://ui-avatars.com/api/?name=admin&color=7F9CF5&background=EBF4FF',
            'is_alumini' => 0,

        ]);
    }
}
