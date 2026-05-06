<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Ulasan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create a dummy user
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        // Create other dummy users for reviews
        $user1 = User::factory()->create(['name' => 'Rizky A.']);
        $user2 = User::factory()->create(['name' => 'Andi P.']);
        $user3 = User::factory()->create(['name' => 'Fajar M.']);
        $user4 = User::factory()->create(['name' => 'Budi S.']);

        // 2. Create the product
        $product = Product::create([
            'name' => 'Rendang Daging Sapi Kemasan – 300g',
            'description' => 'Rendang daging sapi khas Minang dengan bumbu rempah pilihan yang dimasak secara tradisional hingga meresap sempurna. Cocok untuk lauk sehari-hari maupun oleh-oleh khas UMKM lokal Bojongsoang. Panaskan rendang selama 3-5 menit menggunakan microwave atau wajan. Sajikan dengan nasi hangat agar cita rasa lebih nikmat.',
            'price' => 95000,
            'image' => null, // Placeholder will be used
            'weight' => '300 gram',
            'type' => 'Rendang Daging Sapi',
            'packaging' => 'Vacuum pack',
            'shelf_life' => '3-5 hari (suhu ruang), hingga 7 hari (dalam kulkas)',
            'producer' => 'UMKM Lokal Bojongsoang'
        ]);

        // 3. Create reviews matching the mockup
        Ulasan::create([
            'user_id' => $user1->id,
            'product_id' => $product->id,
            'rating' => 5,
            'review_text' => 'Rasanya enak banget! Dagingnya empuk dan bumbunya kerasa banget kayak masakan rumahan. Jadi pedasnya pas, cocok banget buat makan bareng keluarga.',
            'created_at' => Carbon::create(2026, 4, 15, 10, 0, 0)
        ]);

        Ulasan::create([
            'user_id' => $user2->id,
            'product_id' => $product->id,
            'rating' => 5,
            'review_text' => 'Packaging rapi dan higienis. Waktu pengiriman aman, pas dibuka wangi banget. Bakal langganan deh coba dari UMKM.',
            'created_at' => Carbon::create(2026, 4, 14, 15, 30, 0)
        ]);

        Ulasan::create([
            'user_id' => $user3->id,
            'product_id' => $product->id,
            'rating' => 5,
            'review_text' => 'Udah repeat order beberapa kali. Selalu konsisten rasanya, dan pengirimannya juga cepat.',
            'created_at' => Carbon::create(2026, 4, 13, 9, 15, 0)
        ]);

        Ulasan::create([
            'user_id' => $user4->id,
            'product_id' => $product->id,
            'rating' => 5,
            'review_text' => 'Worth it banget harganya. Porsi cukup buat 3 - 4 orang, dan rasanya ga kalah sama restoran.',
            'created_at' => Carbon::create(2026, 4, 12, 18, 45, 0)
        ]);
        
        // Add more dummy reviews for pagination testing
        for ($i = 0; $i < 17; $i++) {
            $dummyUser = User::factory()->create(['name' => 'User ' . ($i+5)]);
            Ulasan::create([
                'user_id' => $dummyUser->id,
                'product_id' => $product->id,
                'rating' => rand(4, 5),
                'review_text' => 'Review dummy untuk testing pagination ke-' . ($i+1),
                'created_at' => Carbon::now()->subDays(10 + $i)
            ]);
        }
    }
}
