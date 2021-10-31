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
            'full_name'     => $this->faker->name(),
            'city'          => $this->faker->city(),
            'state'         => $this->faker->state(),
            'full_address'  => $this->faker->address(),
            'mobile'        => $this->faker->e164PhoneNumber(),
            'user_id'       => $this->faker->numberBetween(1, 50),
        ];
    }
}
