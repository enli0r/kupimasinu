<?php

namespace Database\Seeders;

use App\Models\MarkedCategory;
use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PostImagesSeeder;

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

        // MarkedCategory::create([
        //     'korisnik_id' => 1,
        //     'kategorija_id' => 1
        // ]);

        // MarkedCategory::create([
        //     'korisnik_id' => 2,
        //     'kategorija_id' => 1
        // ]);


    }
}
