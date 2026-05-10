<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Rendang Daging Sapi Kemasan - 300g',
                'slug' => 'rendang-kemasan',
                'price' => 95000,
                'weight' => '300 gram',
                'type' => 'Rendang Daging Sapi',
                'packaging' => 'Vacuum pack',
                'shelf_life' => '3-5 hari (suhu ruang), hingga 7 hari (dalam kulkas)',
                'production' => 'UMKM Lokal Bojongsoang',
                'description' => 'Nikmati kelezatan Rendang Daging Sapi asli dengan resep turun-temurun. Daging pilihan yang empuk dipadu dengan bumbu rempah melimpah yang meresap hingga ke serat daging.',
                'image' => '/images/rendang-kemasan.png'
            ],
            [
                'name' => 'Cimol Bojot Frozen Premium',
                'slug' => 'cimol-bojot-frozen',
                'price' => 18000,
                'weight' => '250 gram',
                'type' => 'Cimol Bojot',
                'packaging' => 'Plastik Vacuum',
                'shelf_life' => '7 hari (suhu ruang), 1 bulan (freezer)',
                'production' => 'UMKM Bojongsoang',
                'description' => 'Cimol bojot khas Garut dengan tekstur kenyal dan bumbu bawang serta cabai yang melimpah. Praktis tinggal goreng dan campur bumbu.',
                'image' => '/images/cimol-bojot.png'
            ],
            [
                'name' => 'Basreng Pedas Daun Jeruk',
                'slug' => 'basreng-kemasan',
                'price' => 12000,
                'weight' => '150 gram',
                'type' => 'Baso Goreng',
                'packaging' => 'Pouch Zipper',
                'shelf_life' => '3 bulan',
                'production' => 'Camilan Lokal Bojong',
                'description' => 'Baso goreng renyah dengan bumbu pedas spesial dan aroma daun jeruk yang segar. Cocok untuk teman santai atau topping makanan.',
                'image' => '/images/basreng-kemasan.png'
            ],
            [
                'name' => 'Kerupuk Kulit Sapi Asli',
                'slug' => 'kerupuk-kulit-sapi',
                'price' => 90000,
                'weight' => '1 kg',
                'type' => 'Kerupuk Kulit',
                'packaging' => 'Plastik Besar',
                'shelf_life' => '2 bulan',
                'production' => 'Produksi Lokal',
                'description' => 'Kerupuk kulit sapi kualitas super, renyah and gurih. Tanpa bahan pengawet and diolah secara higienis.',
                'image' => '/images/kerupuk-kulit.png'
            ],
            [
                'name' => 'Daging Sapi Segar Pilihan',
                'slug' => 'daging-sapi',
                'price' => 120000,
                'weight' => '1 kg',
                'type' => 'Daging Sapi Segar',
                'packaging' => 'Wadah Steril',
                'shelf_life' => '1 hari (suhu ruang), 3-5 hari (kulkas)',
                'production' => 'Peternakan Lokal',
                'description' => 'Daging sapi segar kualitas terbaik dari peternakan lokal Bojongsoang. Dipotong secara higienis and dikemas rapi untuk menjaga kesegaran.',
                'image' => '/images/daging-sapi.png'
            ],
            [
                'name' => 'Ayam Potong Segar Bojongsoang',
                'slug' => 'ayam-potong',
                'price' => 35000,
                'weight' => '1 kg',
                'type' => 'Ayam Potong',
                'packaging' => 'Plastik Higienis',
                'shelf_life' => '1 hari (suhu ruang), 3 hari (kulkas)',
                'production' => 'Peternakan Ayam Lokal',
                'description' => 'Ayam potong segar yang diproses secara halal and higienis. Tekstur daging yang lembut and segar, cocok untuk berbagai olahan masakan rumah.',
                'image' => '/images/ayam-potong.png'
            ],
            [
                'name' => 'Ikan Laut Pilihan Segar',
                'slug' => 'ikan-laut-pilihan',
                'price' => 40000,
                'weight' => '1 kg',
                'type' => 'Ikan Laut',
                'packaging' => 'Es Batu & Plastik',
                'shelf_life' => '1 hari (suhu ruang), 2 hari (kulkas)',
                'production' => 'Nelayan Lokal',
                'description' => 'Ikan laut pilihan yang diambil langsung dari nelayan dalam kondisi segar. Kaya akan protein and omega-3, sangat baik untuk kesehatan keluarga.',
                'image' => '/images/ikan-laut.png'
            ],
            [
                'name' => 'Ikan Campur Segar Pilihan',
                'slug' => 'ikan-campur-segar',
                'price' => 30000,
                'weight' => '1 kg',
                'type' => 'Ikan Air Tawar',
                'packaging' => 'Plastik & Es',
                'shelf_life' => '1 hari',
                'production' => 'Budidaya Lokal Bojong',
                'description' => 'Berbagai jenis ikan air tawar segar pilihan hasil budidaya lokal Bojongsoang. Kondisi sangat segar dan siap diolah menjadi hidangan lezat.',
                'image' => '/images/ikan-campur.png'
            ]
        ];

        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }
    }
}
