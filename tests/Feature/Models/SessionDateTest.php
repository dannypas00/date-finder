<?php

namespace Tests\Feature\Models;

use App\Models\FinderSession;
use App\Models\SessionDate;
use App\Models\SessionDateUser;
use App\Models\User;
use Tests\TestCase;

class SessionDateTest extends TestCase
{
    public function test_that_session_date_belongs_to_session(): void
    {
        $sessionDate = SessionDate::factory()->createOne();

        $this->assertDatabaseHas(FinderSession::class, $sessionDate->finderSession->attributesToArray());
    }

    public function test_that_session_date_has_attendees(): void
    {
        $sessionDate = SessionDate::factory()->createOne();
        $users = User::factory()->count(10)->createMany();
        $sessionDate->attendees()->sync($users);
        $sessionDate->refresh();

        $users->each(
            fn (User $user) => $this->assertDatabaseHas(SessionDateUser::class, ['session_date_id' => $sessionDate->id, 'user_id' => $user->id])
        );
    }
}
