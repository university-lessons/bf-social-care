<?php

namespace Tests\Unit\Models;

use App\Models\Attendance;
use App\Models\Forwarding;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AttendanceForwardingTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_attendance_can_be_created_without_a_forwarding(): void
    {
        $attendance = Attendance::factory()->create();

        $this->assertNull($attendance->forwarding);
    }

    public function test_an_attendance_can_have_a_forwarding(): void
    {
        $attendance = Attendance::factory()->create();

        $attendance->forwarding()->save(Forwarding::factory()->create());

        $this->assertNotNull($attendance->forwarding);
        $this->assertInstanceOf(Forwarding::class, $attendance->forwarding);
    }
}
