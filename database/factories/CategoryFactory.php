<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $name = $this->faker->domainWord();
        return [
            'name'        => $name,
            'slug'        => Str::slug($name),
            'parent_id'   => $this->faker->numberBetween(1, 5),
            'description' => $this->faker->realTextBetween(160, 200),
            'is_featured' => $this->faker->boolean(),
            'in_menu'     => $this->faker->boolean(),
            'image'       => $this->faker->imageUrl(200, 200),
        ];
    }
}
