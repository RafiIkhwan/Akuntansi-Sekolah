<?php

namespace Database\Seeders\Insert;

use App\Models\SPP;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() :void
    {
        SPP::insert([
            [
                'tahun_ajaran'  => '2022/2023',
                'biaya'         => '150000',
            ],
            [
                'tahun_ajaran'  => '2023/2024',
                'biaya'         => '180000',
            ],
            [
                'tahun_ajaran'  => '2024/2025',
                'biaya'         => '200000',
            ],
        ]);
    }
}
