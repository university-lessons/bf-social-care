<?php

namespace Tests\Feature;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class SetForwardingTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_user_cannot_set_forwarding(): void
    {
        $user = User::factory()->create();
        $attendance = Attendance::factory()->create([
            'user_id' => $user->id
        ]);

        $this->assertNull($attendance->forwarding);

        $this->post(route('admin.attendances.setforwarding', ['attendance' => $attendance->id]), [
            'description' => 'Encaminhamento...'
        ]);

        $attendance->refresh();

        $this->assertNull($attendance->forwarding);
    }

    public function test_authenticated_user_can_set_forwarding_if_not_already_set(): void
    {
        $user = User::factory()->create();
        $attendance = Attendance::factory()->create([
            'user_id' => $user->id
        ]);

        $this->assertNull($attendance->forwarding);

        $this->actingAs($user);

        $this->post(route('admin.attendances.setforwarding', ['attendance' => $attendance->id]), [
            'description' => 'Encaminhamento...'
        ]);

        $attendance->refresh();

        $this->assertNotNull($attendance->forwarding);
    }

    public function test_authenticated_user_can_set_forwarding_if_already_set_by_himself(): void
    {
        $user = User::factory()->create();
        $attendance = Attendance::factory()->create([
            'user_id' => $user->id
        ]);

        $this->assertNull($attendance->forwarding);

        $this->actingAs($user);

        $this->post(route('admin.attendances.setforwarding', ['attendance' => $attendance->id]), [
            'description' => 'Encaminhamento'
        ]);

        $attendance->refresh();

        $this->assertEquals('Encaminhamento', $attendance->forwarding->description);

        $this->post(route('admin.attendances.setforwarding', ['attendance' => $attendance->id]), [
            'description' => 'Encaminhamento2'
        ]);

        $attendance->refresh();

        $this->assertEquals('Encaminhamento2', $attendance->forwarding->description);
    }

    public function test_authenticated_user_cannot_set_forwarding_if_already_set_by_other_user(): void
    {
        $user = User::factory()->create();
        $attendance = Attendance::factory()->create([
            'user_id' => $user->id
        ]);

        $this->assertNull($attendance->forwarding);

        $this->actingAs($user);

        $this->post(route('admin.attendances.setforwarding', ['attendance' => $attendance->id]), [
            'description' => 'Encaminhamento'
        ]);

        $attendance->refresh();

        $user2 = User::factory()->create();

        $this->actingAs($user2);

        $this->assertEquals('Encaminhamento', $attendance->forwarding->description);

        $response = $this->post(route('admin.attendances.setforwarding', ['attendance' => $attendance->id]), [
            'description' => 'Encaminhamento2'
        ]);

        $response->assertStatus(Response::HTTP_FORBIDDEN);

        $attendance->refresh();

        $this->assertEquals('Encaminhamento', $attendance->forwarding->description);
    }
}
