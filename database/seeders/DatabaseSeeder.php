<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Service;

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
            categorySeeder::class,
            // Other seeders...
        ]);

        \App\Models\Service::factory(10)->create();


    }
}
