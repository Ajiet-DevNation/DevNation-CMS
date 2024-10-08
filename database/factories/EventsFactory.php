<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Events>
 */
class EventsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(),
            'event_type' => $this->faker->randomElement(['webinar', 'workshop', 'seminar']),
            'location' => $this->faker->city(),
            'banner' => $this->faker->imageUrl(),
            'speaker' => $this->faker->name(),
            'speaker_mail' => $this->faker->email(),
            'status' => $this->faker->randomElement(['draft', 'published']),
            'is_featured' => $this->faker->boolean(),
            'requires_registration' => $this->faker->boolean(),
            'max_attendees' => $this->faker->numberBetween(50, 200),
            'start_date' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'end_date' => $this->faker->dateTimeBetween('+1 month', '+2 month'),
            'has_certificate' => $this->faker->boolean(),

        ];
    }
}
