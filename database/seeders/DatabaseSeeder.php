<?php

namespace Database\Seeders;

use App\Models\FinderSession;
use App\Models\SessionDate;
use App\Models\User;
use Exception;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @throws Exception
     */
    public function run(): void
    {
        User::factory()->create([
            'name'     => 'Test User',
            'email'    => 'test@example.com',
            'password' => 'test1234',
        ]);

        User::factory(30)->create();

        FinderSession::factory()->count(5)
            ->has(
                SessionDate::factory()->count(random_int(1, 3))->afterCreating(
                    fn (SessionDate $sessionDate) => $sessionDate->attendees()
                        ->sync(
                            User::inRandomOrder()->take(rand(3, 10))->pluck('id')
                        )
                ),
                'sessionDates'
            )
            ->create();
    }
}
