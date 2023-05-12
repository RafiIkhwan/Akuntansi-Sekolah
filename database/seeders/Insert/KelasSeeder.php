<?php

namespace Database\Seeders\Insert;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() :void
    {
        Kelas::insert([
            [
                'nama_kelas'            => 'X RPL A',
                'kompetensi_keahlian'   => 'Rekayasa Perangkat Lunak',
            ],
            [
                'nama_kelas'            => 'X RPL B',
                'kompetensi_keahlian'   => 'Rekayasa Perangkat Lunak',
            ],
            [
                'nama_kelas'            => 'XI RPL A',
                'kompetensi_keahlian'   => 'Rekayasa Perangkat Lunak',
            ],
            [
                'nama_kelas'            => 'XI RPL B',
                'kompetensi_keahlian'   => 'Rekayasa Perangkat Lunak',
            ],
            [
                'nama_kelas'            => 'XII RPL A',
                'kompetensi_keahlian'   => 'Rekayasa Perangkat Lunak',
            ],
            [
                'nama_kelas'            => 'XII RPL B',
                'kompetensi_keahlian'   => 'Rekayasa Perangkat Lunak',
            ],
            [
                'nama_kelas'            => 'XII RPL C',
                'kompetensi_keahlian'   => 'Rekayasa Perangkat Lunak',
            ],
        ]);
    }
}
