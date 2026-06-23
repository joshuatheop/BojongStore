<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateProductTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Test admin can create a product.
     */
    public function test_admin_can_create_product(): void
    {
        // 1. Seed database
        $this->seed(\Database\Seeders\DatabaseSeeder::class);
        $this->seed(\Database\Seeders\CategorySeeder::class);

        // 2. Find the admin user created by the seeder
        $admin = User::where('role', 'admin')->first();

        $this->browse(function (Browser $browser) use ($admin) {
            // Path to our testing image
            $imagePath = base_path('tests/Browser/fixtures/test-product.png');

            // Visually verify file exists
            $this->assertFileExists($imagePath);

            $browser->loginAs($admin)
                ->visitRoute('admin.products.create')
                // Wait for the form to load
                ->waitFor('form[action="' . route('admin.products.store') . '"]')
                
                // Set the hidden file input to be visible and upload the image
                ->script([
                    "document.getElementById('mainImageInput').classList.remove('hidden');",
                    "document.getElementById('mainImageInput').style.display = 'block';",
                ]);

            $browser->attach('image', $imagePath)
                ->type('name', 'Kripik Pisang Dusk Test')
                ->type('price', '15000')
                ->select('category_id', '1') // Category ID 1 (Sayuran)
                ->type('description', 'Deskripsi produk kripik pisang yang lezat dan renyah, dibuat khusus untuk pengujian Laravel Dusk.')
                ->type('whatsapp', '628123456789')
                ->type('shoppee', 'https://shopee.co.id/kripik-pisang-dusk')
                ->type('tags', 'kripik, pisang, manis')
                ->type('weight', '250g')
                ->type('type', 'Makanan')
                ->type('packaging', 'Pouch')
                ->type('shelf_life', '6 bulan')
                ->type('production', 'Setiap Hari')
                
                // Submit the form
                ->press('Simpan Produk')
                
                // Assertions
                // Wait for the success sweet alert
                ->waitForText('Produk berhasil ditambahkan.', 10)
                // Assert URL is index page
                ->assertRouteIs('admin.products.index')
                // Assert the new product is displayed on the index page
                ->assertSee('Kripik Pisang Dusk Test');
        });
    }
}
