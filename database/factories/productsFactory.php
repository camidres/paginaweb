<?php

namespace Database\Factories;

use App\Models\products;
use App\Models\subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\products>
 */
class productsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = products::class;

     public function definition()
    {
        $name = $this->faker->sentence(2);
        $subcategory = subcategory::all()->random();
        $category = $subcategory->category;

        $brand = $category->brands->random();



        // if($subcategory->color){
        //     $quantity = null;
        // }else{
        //     $quantity = 15;
        // }



        return [

            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomElement([19.99, 49.99, 90.99]),
            'subcategory_id' => $subcategory->id,
            'brand_id' => $brand->id,
            'quantity'=> $this->faker->randomElement([10,5,7]),
            'status' => 2


        ];
    }
}
