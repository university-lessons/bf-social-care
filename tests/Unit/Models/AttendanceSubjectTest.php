<?php

namespace Tests\Unit\Models;

use App\Models\Attendance;
use App\Models\Subject;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AttendanceSubjectTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_attendance_is_related_to_a_subject(): void
    {
        $attendance = Attendance::factory()->create();

        $this->assertNotNull($attendance->subject);
        $this->assertInstanceOf(Subject::class, $attendance->subject);
    }
}
