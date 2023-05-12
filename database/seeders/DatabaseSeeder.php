<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\Insert\SppSeeder;
use Database\Seeders\Insert\PetugasSeeder;
use Database\Seeders\Insert\KelasSeeder;
use Database\Seeders\Insert\SiswaSeeder;

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
            SppSeeder::class,
            PetugasSeeder::class,
            KelasSeeder::class,
            SiswaSeeder::class,
        ]);
    }
}
