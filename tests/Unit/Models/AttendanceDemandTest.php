<?php

namespace Tests\Unit\Models;

use App\Models\Attendance;
use App\Models\Demand;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AttendanceDemandTest extends TestCase
{
    use RefreshDatabase;

    public function test_an_attendance_can_be_created_without_demands(): void
    {
        $attendance = Attendance::factory()->create();

        $this->assertCount(0, $attendance->demands);
    }

    public function test_an_attendance_can_have_multiple_demands(): void
    {
        $attendance = Attendance::factory()->create();

        $attendance->demands()->saveMany(Demand::factory()->count(3)->create());

        $this->assertCount(3, $attendance->demands);
    }

    public function test_attendance_demand_inverse_relationship_exists(): void
    {
        $attendance = Attendance::factory()->create();

        $demand = Demand::factory()->create();

        $demand->attendances()->save($attendance);

        $this->assertEquals($attendance->id, $demand->attendances->first()->id);
    }
}
