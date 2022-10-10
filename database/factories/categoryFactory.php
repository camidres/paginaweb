<?php

namespace Database\Factories;
use App\Models\category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\category>
 */
class categoryFactory extends Factory
{

    protected $model = category::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'image' => 'categories/' . $this->faker->image('public/storage/categories', 640, 480, null, false) //imagen1.jpg
        ];
    }
}
