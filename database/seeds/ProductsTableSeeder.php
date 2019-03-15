<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p1 = [
            'name' => 'Oneplus 6T',
            'image' => 'uploads/products/OnePlus-6T.jpg',
            'price' => 38000,
            'description' => 'OnePlus 6T is powered by an octa-core Qualcomm Snapdragon 845 processor that features 4 cores clocked at 2.8GHz.
             It comes with 8GB of RAM. The OnePlus 6T runs Android 9.0 and is powered by a 3,700mAh non-removable battery. The OnePlus 6T supports proprietary fast charging.'
        ];

        Product::create($p1);
    }
}
