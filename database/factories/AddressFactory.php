<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'    => $this->faker->name(),
            'street'  => $this->faker->streetAddress(),
            'state'   => $this->faker->state(),
            'city'    => $this->faker->city(),
            'country' => $this->faker->country(),
            'postal'  => $this->faker->postcode(),
            'mobile'  => $this->faker->e164PhoneNumber(),
            'user_id' => $this->faker->numberBetween(1, 50),
        ];
    }
}
