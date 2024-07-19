<?php

namespace Database\Factories;

use App\Models\FinderSession;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SessionDate>
 */
class SessionDateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'finder_session_id' => fn () => FinderSession::factory()->create(),
            'date' => $this->faker->dateTimeBetween('now', '2 weeks')
        ];
    }
}
