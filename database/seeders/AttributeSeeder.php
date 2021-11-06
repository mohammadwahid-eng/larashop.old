<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Attribute;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a size attribute
        Attribute::create([
            'name'          => 'Size',
            'slug'          => 'size',
            'frontend_type' => 'select',
        ]);

        // Create a color attribute
        Attribute::create([
            'name'          => 'Color',
            'slug'          => 'color',
            'frontend_type' => 'select',
        ]);
    }
}
