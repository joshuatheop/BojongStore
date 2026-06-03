<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteReviewTest extends DuskTestCase
{
    /**
     * Test that an admin can submit and then delete their own review.
     */
    public function test_admin_can_delete_own_review(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->waitForText('Masuk', 10)
                ->waitFor('#email', 10)
                ->type('email', 'admin@bojongstore.com')
                ->type('password', 'pplsi4702')
                ->press('Masuk')
                ->waitForLocation('/')
                ->visit('/produk/rendang-kemasan')
                ->waitFor('#openReviewModal', 10)
                ->click('#openReviewModal')
                ->pause(500)
                ->click('.star-input[data-value="5"]')
                ->type('#reviewComment', ' mantapp ')
                ->click('#submitReview')
                ->waitForText('Ulasan mu berhasil terkirim !', 10)
                ->pause(1000)
                ->refresh()
                ->waitFor('.btn-delete-review', 10)
                ->assertVisible('.btn-delete-review')
                ->acceptDialog()
                ->click('.btn-delete-review')
                ->pause(500)
                ->assertDontSee(' mantapp ');
        });
    }
}
