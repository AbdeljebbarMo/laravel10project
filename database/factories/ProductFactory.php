<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 10, 1000), // Generate random price between 10 and 1000 with 2 decimal places
            'product_code' => $this->faker->unique()->ean13, // Generate a unique EAN-13 product code
            'description' => $this->faker->paragraph,
        ];
    }
}
