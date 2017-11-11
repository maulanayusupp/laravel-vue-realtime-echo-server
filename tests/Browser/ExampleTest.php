<?php

namespace Tests\Browser;

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
        $this->browse(function ($first, $second) {
            $first->loginAs(User::find(1))
                  ->visit('/chat')
                  ->waitForText('Message');

            $second->loginAs(User::find(2))
                   ->visit('/chat')
                   ->waitForText('Message')
                   ->type('message', 'Hey Taylor')
                   ->press('Send');

            $first->waitForText('Hey Taylor')
                  ->assertSee('Jeffrey Way');
        });
    }
}
