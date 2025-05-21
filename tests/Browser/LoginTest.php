<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    use DatabaseTruncation;

    public function testAnUserCannotLoginWithIncorrectCredentials(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create([
                'email' => 'dusk@example.com',
            ]);

            $this->browse(function (Browser $browser) use ($user) {
                $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'incorrect')
                    ->press('Entrar')
                    ->assertPathIs('/login');
            });
        });
    }

    public function testAnUserCanLoginWithCorrectCredentials(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create([
                'email' => 'dusk@example.com',
            ]);

            $this->browse(function (Browser $browser) use ($user) {
                $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'password')
                    ->screenshot('login1')
                    ->press('Entrar')
                    ->waitForLocation('/admin/subjects')
                    ->screenshot('login2')
                    ->assertPathIs('/admin/subjects');
            });

            $browser->logout();
        });
    }
}
