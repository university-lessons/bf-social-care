<?php

namespace Tests\Browser;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateAttendanceTest extends DuskTestCase
{
    use DatabaseTruncation;

    private User $user;
    private Subject $subject;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->subject = Subject::factory()->create();
        $this->artisan('db:seed');
    }

    public function testAnUserCanRegisterAnAttendance(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit('/admin/subjects/1/attendances')
                ->assertSee('Cadastrar novo Atendimento');

            $browser->type('description', 'Atendimento exemplo')
                ->screenshot('description')
                ->click("#origin-external")
                ->check('#demand-1');

            $browser->screenshot('create_attendance');

            $browser->press('Cadastrar')
                ->waitForLocation('/admin/subjects/1')
                ->assertPathIs('/admin/subjects/1');
        });
    }
}
