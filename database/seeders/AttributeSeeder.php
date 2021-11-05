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
            'code'          => 'size',
            'name'          => 'Size',
            'frontend_type' => 'select',
            'is_filterable' => true,
            'is_required'   => true,
        ]);

        // Create a color attribute
        Attribute::create([
            'code'          => 'color',
            'name'          => 'Color',
            'frontend_type' => 'select',
            'is_filterable' => true,
            'is_required'   => true,
        ]);
    }
}
