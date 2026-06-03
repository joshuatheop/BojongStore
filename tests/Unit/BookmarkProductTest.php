<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class BookmarkProductTest extends DuskTestCase
{
    /**
     * Test that an admin can add a product to favorites/bookmarks.
     */
    public function test_admin_can_add_product_to_bookmark(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->waitFor('#email', 10)
                ->type('email', 'admin@bojongstore.com')
                ->type('password', 'pplsi4702')
                ->press('Masuk')
                ->waitForLocation('/')
                ->visit('/produk/rendang-kemasan')
                ->waitFor('.btn-fav-circle', 10)
                ->click('.btn-fav-circle')
                ->pause(1000)
                ->assertPresent('.btn-fav-circle.active');
        });
    }
}
