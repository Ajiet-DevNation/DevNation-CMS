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
            'is_verified' => true,
            'usn' => '4JK21CS001',
            'semester' => '5',
            'branch' => 'CSE',
            'phone' => '9876543210',
            'role' => 'core_member',
            'image' => 'https://ui-avatars.com/api/?name=admin&color=7F9CF5&background=EBF4FF',
            'is_alumini' => false,

        ]);
        User::factory()->create([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => bcrypt('test'),
            'is_admin' =>false,
            'is_verified' => false,
            'usn' => '4JK21CS002',
            'semester' => '6',
            'branch' => 'CSE',
            'phone' => '9876542210',
            'role' => 'core_member',
            'image' => 'https://ui-avatars.com/api/?name=admin&color=7F9CF5&background=EBF4FF',
            'is_alumini' => false,

        ]);
    }
}
