<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditProductTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Test admin can edit a product.
     */
    public function test_admin_can_edit_product(): void
    {
        // 1. Seed database
        $this->seed(\Database\Seeders\DatabaseSeeder::class);
        $this->seed(\Database\Seeders\CategorySeeder::class);

        // 2. Find the admin user created by the seeder
        $admin = User::where('role', 'admin')->first();

        $this->browse(function (Browser $browser) use ($admin) {
            $imagePath = base_path('tests/Browser/fixtures/test-product.png');

            $this->assertFileExists($imagePath);

            // 1. Create a product first
            $browser->loginAs($admin)
                ->visitRoute('admin.products.create')
                ->waitFor('form[action="' . route('admin.products.store') . '"]')
                ->script([
                    "document.getElementById('mainImageInput').classList.remove('hidden');",
                    "document.getElementById('mainImageInput').style.display = 'block';",
                ]);

            $browser->attach('image', $imagePath)
                ->type('name', 'Produk Awal')
                ->type('price', '15000')
                ->select('category_id', '1')
                ->type('description', 'Deskripsi awal.')
                ->type('whatsapp', '628123456789')
                ->type('shoppee', 'https://shopee.co.id/awal')
                ->type('tags', 'awal, test')
                ->type('weight', '100g')
                ->type('type', 'Makanan')
                ->type('packaging', 'Pouch')
                ->type('shelf_life', '1 bulan')
                ->type('production', 'Mingguan')
                ->press('Simpan Produk')
                ->waitForText('Produk Awal', 10);

            // 2. Find the created product to get its ID
            $product = Product::where('name', 'Produk Awal')->first();

            // 3. Edit the product
            $browser->visitRoute('admin.products.edit', $product->id)
                ->waitFor('input[name="name"]')
                ->type('name', 'Produk Telah Diedit')
                ->type('price', '25000')
                ->type('description', 'Deskripsi telah diubah.')
                ->press('Simpan Produk')
                ->waitForText('Produk Telah Diedit', 10)
                ->assertRouteIs('admin.products.index')
                ->assertSee('Produk Telah Diedit')
                ->assertDontSee('Produk Awal');
        });
    }
}
