<?php

namespace Database\Seeders;

use App\Models\MarkedCategory;
use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PostImagesSeeder;
use App\Imports\NaseljaImport;
use Maatwebsite\Excel\Facades\Excel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // UserSeeder::class,
            CategorySeeder::class,
            // PostSeeder::class,
            // PostImagesSeeder::class,
        ]);


        Excel::import(new NaseljaImport, 'spisak_naselja.xlsx', 'import');

    }
}
