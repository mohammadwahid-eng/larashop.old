<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->domainWord(),
            'slug'        => $this->faker->slug(3, false),
            'description' => $this->faker->realTextBetween(160, 200),
            'parent_id'   => $this->faker->numberBetween(1, 5),
            'featured'    => $this->faker->boolean(),
            'menu'        => $this->faker->boolean(),
            'image'       => $this->faker->imageUrl(200, 200),
        ];
    }
}
