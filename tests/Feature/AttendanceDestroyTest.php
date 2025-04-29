<?php

namespace Tests\Feature;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class AttendanceDestroyTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_user_cannot_destroy_attendance(): void
    {
        $user = User::factory()->create();
        $attendance = Attendance::factory()->create([
            'user_id' => $user->id
        ]);

        $this->assertDatabaseHas('attendances', ['id' => $attendance->id]);

        $this->delete(route('admin.attendances.destroy', ['attendance' => $attendance->id]));

        $this->assertDatabaseHas('attendances', ['id' => $attendance->id]);
    }

    public function test_authenticated_user_can_destroy_his_own_attendance(): void
    {
        $user = User::factory()->create();
        $attendance = Attendance::factory()->create([
            'user_id' => $user->id
        ]);

        $this->assertDatabaseHas('attendances', ['id' => $attendance->id]);

        $this->actingAs($user);

        $this->delete(route('admin.attendances.destroy', ['attendance' => $attendance->id]));

        $this->assertDatabaseMissing('attendances', ['id' => $attendance->id]);
    }

    public function test_authenticated_user_cannot_destroy_other_user_attendance(): void
    {
        $user = User::factory()->create();
        $attendance = Attendance::factory()->create([
            'user_id' => $user->id
        ]);

        $this->assertDatabaseHas('attendances', ['id' => $attendance->id]);

        $user2 = User::factory()->create();

        $this->actingAs($user2);

        $response = $this->delete(route('admin.attendances.destroy', ['attendance' => $attendance->id]));

        $response->assertStatus(Response::HTTP_FORBIDDEN);

        $this->assertDatabaseHas('attendances', ['id' => $attendance->id]);
    }
}
