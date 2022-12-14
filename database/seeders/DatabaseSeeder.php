<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('products');
        Storage::deleteDirectory('categories');
        Storage::deleteDirectory('subcategories');

        Storage::makeDirectory('products');
        Storage::makeDirectory('categories');
        Storage::makeDirectory('subcategories');


        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubcategorySeeder::class);
        $this->call(ProductsSeeder::class);

        $this->call(DepartmentSeeder::class);
    }
}
