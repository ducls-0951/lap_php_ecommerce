<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    public function test_login_form_fail()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(config('unit_test.login_test'))
                ->type('email', 'leduc.kma@gmail.com')
                ->type('password', 'l3duc1810')
                ->click('.btn-login')
                ->assertPathIs(config('unit_test.path_fail'));
        });
    }

    public function test_login_form_success()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(config('unit_test.login_test'))
                ->type('email', 'leduc.kma@gmail.com')
                ->type('password', 'l3duc2908')
                ->click('.btn-login')
                ->assertPathIs(config('unit_test.path_success'));
        });
    }
}
