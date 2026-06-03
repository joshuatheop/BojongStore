<?php

namespace Tests\Browser;

use App\Models\Category;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ProductTest extends DuskTestCase
{
    public function test_admin_can_create_product()
    {
        $category = Category::first();

        $this->browse(function (Browser $browser) use ($category) {

            $browser->visit('/login')

                ->type('email', 'admin@bojongstore.com')
                ->type('password', 'pplsi4702')
                ->press('Masuk')

                ->pause(2000)

                ->visit(route('admin.products.create'))

                ->attach(
                    'image',
                    storage_path('app/testing/product.jpg')
                )

                ->type('name', 'Keripik Pisang Test')
                ->type('price', '15000')
                ->select('category_id', $category->id)
                ->type('description', 'Produk untuk testing Laravel Dusk')

                ->press('Simpan Produk')

                ->pause(3000);
        });
    }
}