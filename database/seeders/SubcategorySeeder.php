<?php

namespace Database\Seeders;

use App\Models\subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [

              // Salud y medicamentos

            [
                'name' => 'Alivio del dolor',
                'slug' => Str::slug('Alivio del dolor'),
                'category_id' => '1'

            ],

            [
               'name' => 'Cuidado de la vista',
               'slug' => Str::slug('Cuidado de la vista'),
               'category_id' => '1'

           ],

            [
                'name' => 'Dermatologicos',
                    'slug' => Str::slug('acetaminofen'),
                'category_id' => '1'

            ],


            // belleza

            [
                'name' => 'Cosmeticos',
                    'slug' => Str::slug('Cosmeticos'),
                'category_id' => '2'

            ],

            [
                'name' => 'Cuidado de la piel',
                    'slug' => Str::slug('Cuidado de la piel'),

                'category_id' => '2'

            ],


            [
                'name' => 'Dermatologicos',
                    'slug' => Str::slug('acetaminofen'),

                'category_id' => '2'

            ],

            [
                'name' => 'Accesorios de belleza',
                    'slug' => Str::slug('acetaminofen'),

                'category_id' => '2'

            ],



            // cuidado del bebe

            [
                'name' => 'Higiene del bebe',
                    'slug' => Str::slug('Higiene del bebe'),

                'category_id' => '3'

            ],

            [
                'name' => 'Formulas infantiles',
                    'slug' => Str::slug('Formulas infantiles'),

                'category_id' => '3'

            ],

            [
                'name' => 'Pañales y pañitos humedos',
                    'slug' => Str::slug('Pañales y pañitos humedos'),

                'category_id' => '3'

            ],


            // cuidado personal


            [
                'name' => 'Cuidado de la piel ',
                    'slug' => Str::slug('Cuidado de la piel'),

                'category_id' => '4'

            ],

            [
                'name' => 'Cuidado del cabello',
                    'slug' => Str::slug('cuidado del cabello'),

                'category_id' => '4'

            ],

            [
                'name' => 'Cuidado bucal',
                    'slug' => Str::slug('Cuidado bucal'),

                'category_id' => '4'

            ],









        ];


        foreach ($subcategories as $subcategory) {

            subcategory::create($subcategory);
        }
    }
}
// ->first() estaba despues de subcategoria 
