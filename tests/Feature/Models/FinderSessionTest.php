<?php

namespace Tests\Feature\Models;

use App\Models\FinderSession;
use App\Models\SessionDate;
use App\Models\SessionDateUser;
use App\Models\User;
use Tests\FeatureTestCase;

class FinderSessionTest extends FeatureTestCase
{
    public function test_that_finder_session_has_a_creator(): void
    {
        $user = User::factory()->createOne();
        $session = FinderSession::factory()->createOne(['creator_id' => $user->id]);

        $this->assertDatabaseHas(FinderSession::class, ['creator_id' => $user->id]);
        $this->assertEquals($user->id, $session->refresh()->creator->id);
    }

    public function test_that_finder_session_has_session_dates(): void
    {
        $session = FinderSession::factory()->createOne();
        $dates = SessionDate::factory()->count(3)->create(['finder_session_id' => $session->id]);
        $session->refresh();

        $this->assertCount(3, $session->sessionDates);
    }
}
