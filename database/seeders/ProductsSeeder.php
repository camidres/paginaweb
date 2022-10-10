<?php

namespace Database\Seeders;

use App\Models\image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\products;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        products::factory(100)->create()->each(function(products $products){

            image::factory(4)->create([

                'imageable_id' => $products->id,
                'imageable_type' => products::class
            ]);

        });
    }
}
