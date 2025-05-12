<?php

namespace Tests\Feature;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DestroyAttachmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_user_cannot_destroy_attachment()
    {
        $attendance = Attendance::factory()->create();
        $attachment = $attendance->attachments()->create(['filepath' => 'example.pdf']);

        $response = $this->delete(route('admin.attachments.destroy', ['attachment' => $attachment->id]));

        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_destroy_attachment()
    {
        $user = User::factory()->create();
        $attendance = Attendance::factory()->create();
        $attachment = $attendance->attachments()->create(['filepath' => 'example.pdf']);

        $this->actingAs($user);

        $response = $this->delete(route('admin.attachments.destroy', ['attachment' => $attachment->id]));

        $response->assertRedirect();
        $response->assertSessionHas('success');
        $this->assertCount(0, $attendance->fresh()->attachments);
    }

    public function test_destroy_attachment_requires_valid_attachment_id()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->delete(route('admin.attachments.destroy', ['attachment' => 999]));

        $response->assertNotFound();
    }
}
