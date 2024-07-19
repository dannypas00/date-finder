<?php

namespace Database\Factories;

use App\Enums\Attendance;
use App\Models\SessionDate;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SessionDateUser>
 */
class SessionDateUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'session_date_id' => fn () => SessionDate::factory()->createOne(),
            'user_id' => fn () => User::factory()->createOne(),
            'attendance' => $this->faker->randomElement(Attendance::cases()),
            'comment' => $this->faker->boolean(20) ? $this->faker->realText : null
        ];
    }
}
