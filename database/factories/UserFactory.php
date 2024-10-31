<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\College;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            // 'usn' => '4JK' . rand(0, 99) . 'CS' . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT),
            'usn' => strtoupper(fake()->regexify('[A-Z]{2}')) . rand(10, 99) . fake()->regexify('[A-Z]{2}') . str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT),
            'semester' => (string) rand(1, 8),
            'phone' => fake()->unique()->phoneNumber(),
            'is_alumini' => false,
            'is_admin' => false,
            'is_verified' => true,
            'image' => null,
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'college_id' => College::first()->id,
            'branch_id' => Branch::first()->id,
            'role_id' => Role::first()->id,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
