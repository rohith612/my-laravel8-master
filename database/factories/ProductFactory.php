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
            'name' => $this->faker->name(),
            'product_code' => $this->faker->uuid(),
            'shipping_code' => $this->faker->uuid(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(),
            'quantity' => $this->faker->randomDigit(),
            'batch' => now(),
        ];
    }
}
