<?php

namespace Tests\Browser;

use Faker\Factory;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }
    public function testBasicRegister()
    {
        $this->browse(function (Browser $browser) {
            $faker = Factory::create();
            $pwd = $faker->password(10);
            $browser->visit('/register')
                ->assertSee('Name')
                ->type('name', $faker->name)
                ->type('email', $faker->email)
                ->type('password', $pwd)
                ->type('password_confirmation', $pwd)
                ->press('Register')
                ->assertPathIs('/home')
            ;

            ;
        });
    }
}
