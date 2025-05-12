<?php

namespace Tests\Feature;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class StoreAttachmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_unauthenticated_user_cannot_store_attachment()
    {
        $attendance = Attendance::factory()->create();

        $response = $this->post(route('admin.attendances.storeAttachment', ['attendance' => $attendance->id]), [
            'file' => UploadedFile::fake()->create('example.pdf'),
        ]);

        $response->assertRedirect('/login');
    }

    public function test_authenticated_user_can_store_attachment()
    {
        $user = User::factory()->create();
        $attendance = Attendance::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('admin.attendances.storeAttachment', ['attendance' => $attendance->id]), [
            'file' => UploadedFile::fake()->create('example.pdf'),
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');
        $this->assertCount(1, $attendance->fresh()->attachments);
    }

    public function test_attachment_requires_file()
    {
        $user = User::factory()->create();
        $attendance = Attendance::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('admin.attendances.storeAttachment', ['attendance' => $attendance->id]));

        $response->assertSessionHasErrors('file');
    }

    public function test_attachment_requires_valid_file_type()
    {
        $user = User::factory()->create();
        $attendance = Attendance::factory()->create();

        $this->actingAs($user);

        $response = $this->post(route('admin.attendances.storeAttachment', ['attendance' => $attendance->id]), [
            'file' => UploadedFile::fake()->create('example.exe'),
        ]);

        $response->assertSessionHasErrors('file');
    }
}
