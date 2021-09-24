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
            'title'=>$this->faker->name(),
            'description'=>$this->faker->text(20),
            'price'=>$this->faker->randomNumber(3)*100,
            'image'=>"http://127.0.0.1:8000/10.jpg",
        ];
    }
}
