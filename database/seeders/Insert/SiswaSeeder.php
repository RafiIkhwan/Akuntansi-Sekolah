<?php

namespace Database\Seeders\Insert;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() :void
    {
        Siswa::insert([
            [
                'id_kelas'      => 1,
                'id_spp'        => 1,
                'nis'           => 661052,
                'nisn'          => 211115700,
                'nama_siswa'    => 'Rafi Ikhwan Purnama',
                'hp'            => '0841213',
                'alamat'        => 'Jl. Panembakan No 234',
            ],
            [
                'id_kelas'      => 2,
                'id_spp'        => 2,
                'nis'           => 751221,
                'nisn'          => 211115701,
                'nama_siswa'    => 'Raihan Satya Natha',
                'hp'            => '0723812',
                'alamat'        => 'Jl. Ibu Ganirah No 234',
            ],
            [
                'id_kelas'      => 3,
                'id_spp'        => 3,
                'nis'           => 421241,
                'nisn'          => 211115702,
                'nama_siswa'    => 'Revaldy Zania Putra',
                'hp'            => '023821',
                'alamat'        => 'Jl. Paledang No 123',
            ],
        ]);
    }
}
