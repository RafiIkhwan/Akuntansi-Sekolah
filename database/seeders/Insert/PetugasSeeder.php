<?php

namespace Database\Seeders\Insert;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() :void
    {
        User::insert([
            [
                'nama_admin'    =>'Admin',
                'email'         =>'admin@gmail.com',
                'password'      =>Hash::make('admin123'),
                'role'          =>'Admin',
            ],
            [
                'nama_admin'    =>'Petugas',
                'email'         =>'coba@gmail.com',
                'password'      =>Hash::make('coba123'),
                'role'          =>'Petugas',
            ],
                
        ]);
    }
}
