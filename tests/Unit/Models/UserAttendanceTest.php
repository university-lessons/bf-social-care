<?php

namespace Tests\Unit\Models;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserAttendanceTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_have_multiple_attendances(): void
    {
        $user = User::factory()->create();

        Attendance::factory()->for($user)->count(3)->create();

        $user->refresh();

        $this->assertCount(3, $user->attendances);
    }
}
