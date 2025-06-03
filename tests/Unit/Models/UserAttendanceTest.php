<?php

namespace Tests\Unit\Models;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserAttendanceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_an_user_can_have_multiple_attendances(): void
    {
        $user = User::factory()->create();

        Attendance::factory()->for($user)->count(3)->create();

        $this->assertCount(1, $user->attendances);
    }
}
