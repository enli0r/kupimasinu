<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'id' => 1,
            'naziv' => 'masina za drvo'
        ]);

        Category::create([
            'id' => 2,
            'naziv' => 'masina za metal'
        ]);

        Category::create([
            'id' => 3,
            'naziv' => 'masina za plastiku'
        ]);

        Category::create([
            'id' => 4,
            'naziv' => 'radna masina'
        ]);
    }
}
