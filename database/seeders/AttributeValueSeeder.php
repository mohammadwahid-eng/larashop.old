<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AttributeValue;
use Illuminate\Support\Str;

class AttributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = ['Small', 'Medium', 'Large'];
        $colors = ['Black', 'Blue', 'Red'];

        foreach ($sizes as $size) {
            AttributeValue::create([
                'name'        => $size,
                'slug'        => Str::slug($size),
                'description' => 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.',
                'attribute_id' => 1,
            ]);
        }

        foreach ($colors as $color) {
            AttributeValue::create([
                'name'        => $color,
                'slug'        => Str::slug($color),
                'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.',
                'attribute_id' => 2,
            ]);
        }
    }
}
