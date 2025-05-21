<?php

namespace Tests\Browser;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateForwardingTest extends DuskTestCase
{
    use DatabaseTruncation;

    private User $user;
    private Attendance $attendance;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->attendance = Attendance::factory()->create();
        $this->artisan('db:seed');
    }

    public function testAnUserCanRegisterForwarding(): void
    {
        $this->browse(function (Browser $browser) {
            $this->browse(function (Browser $browser) {
                $browser->loginAs($this->user)
                    ->visit(route('admin.attendances.detail', $this->attendance))
                    ->assertSee('Detalhes do Atendimento');

                $browser->type('description', 'Encaminhamento exemplo');

                $browser->press('Registrar encaminhamentos');

                $browser->waitForText("Alteração realizada com sucesso!");
                $browser->assertSee("Alteração realizada com sucesso!");
            });
        });
    }

    public function testAnUserCanAddAttachment(): void
    {
        $this->browse(function (Browser $browser) {
            $this->browse(function (Browser $browser) {
                $browser->loginAs($this->user)
                    ->visit(route('admin.attendances.detail', $this->attendance))
                    ->assertSee('Detalhes do Atendimento');

                $browser->attach('file', 'tests/Browser/Files/test.pdf');

                $browser->screenshot('attachment 1');

                $browser->press('Enviar Anexo');

                $browser->screenshot('attachment 2');

                $browser->waitForText("Download PDF");
                $browser->assertSee("Download PDF");
            });
        });
    }
}
