<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteProductTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Test admin can delete a product.
     */
    public function test_admin_can_delete_product(): void
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
                ->type('name', 'Produk Untuk Dihapus')
                ->type('price', '15000')
                ->select('category_id', '1')
                ->type('description', 'Deskripsi awal.')
                ->type('whatsapp', '628123456789')
                ->type('shoppee', 'https://shopee.co.id/hapus')
                ->type('tags', 'hapus')
                ->type('weight', '100g')
                ->type('type', 'Makanan')
                ->type('packaging', 'Pouch')
                ->type('shelf_life', '1 bulan')
                ->type('production', 'Mingguan')
                ->press('Simpan Produk')
                ->waitForText('Produk Untuk Dihapus', 10);

            // 2. Find the created product to get its ID
            $product = Product::where('name', 'Produk Untuk Dihapus')->first();

            // 3. Delete the product
            $browser->visitRoute('admin.products.index')
                ->waitFor('form[action="' . route('admin.products.destroy', $product->id) . '"]')
                ->within('form[action="' . route('admin.products.destroy', $product->id) . '"]', function ($browser) {
                    $browser->click('button[type="submit"]');
                })
                ->acceptDialog()
                ->waitUntilMissingText('Produk Untuk Dihapus', 10)
                ->assertRouteIs('admin.products.index')
                ->assertDontSee('Produk Untuk Dihapus');
        });
    }
}
