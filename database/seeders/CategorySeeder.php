<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [

            [
                'name' => 'Salud y medicamentos',
                'slug' => Str::slug('Salud y medicamentos'),
                'icon' => '<i class="fas fa-pills"></i>'
            ],

            [
                'name' => 'Belleza',
                'slug' => Str::slug('Belleza'),

                'icon' => '<i class="fas fa-pills"></i>'
            ],

            [
                'name' => 'Cuidado del bebe',
                'slug' => Str::slug('Cuidado del bebe'),
                'icon' => '<i class="fas fa-pills"></i>'
            ],

            [
                'name' => 'Cuidado personal',
                'slug' => Str::slug('Cuidado personal'),
                'icon' => '<i class="fas fa-pills"></i>'
            ]




        ];

        foreach ($categories as $category) {
            $category = Category::factory(1)->create($category)->first();

            $brands = Brand::factory(4)->create();

            foreach ($brands as $brand) {
                $brand->categories()->attach($category->id);
            }
        }




    }
}
