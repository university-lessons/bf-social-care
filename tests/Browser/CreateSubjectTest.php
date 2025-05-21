<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateSubjectTest extends DuskTestCase
{
    use DatabaseTruncation;

    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function testAnUserCanCreateASubject(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)
                ->visit('/admin/subjects/create');

            $browser->type('name', 'Fulano Silva')
                ->type('close_relative', 'Ciclana da Silva')
                ->select('income', '2900')
                ->screenshot('select_income')
                ->press('Cadastrar')
                ->waitForLocation('/admin/subjects')
                ->assertPathIs('/admin/subjects')
                ->assertSee('Fulano Silva');

            $browser->screenshot('create_subject');
        });
    }
}
