<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ReviewSubmissionTest extends DuskTestCase
{
    /**
     * Test login with admin and submit a 5-star review for a product.
     */
    public function test_admin_can_submit_product_review(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->assertSee('Selamat Datang!')
                ->type('email', 'admin@bojongstore.com')
                ->type('password', 'pplsi4702')
                ->press('Masuk')
                ->waitForLocation('/')
                ->visit('/produk/rendang-kemasan')
                ->assertSee('Rendang Daging Sapi Kemasan - 300g')
                ->click('#openReviewModal')
                ->pause(500)
                ->click('.star-input[data-value="5"]')
                ->type('#reviewComment', ' mantapp ')
                ->click('#submitReview')
                ->waitForText('Ulasan mu berhasil terkirim !', 5)
                ->assertSee('Ulasan mu berhasil terkirim !');
        });
    }
}
