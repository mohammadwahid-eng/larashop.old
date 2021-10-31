<?php

namespace Database\Factories;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shop::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->company(),
            'description' => $this->faker->realTextBetween(160, 200),
            'rating'      => $this->faker->randomFloat(1, 0, 5),
            'admin_id'    => $this->faker->unique()->numberBetween(1, 20),
        ];
    }
}
