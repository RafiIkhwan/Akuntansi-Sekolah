<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
    use HasFactory, SoftDeletes;


    protected $table = "tbl_siswa";
    protected $primaryKey = "id_siswa";

    protected $fillable = [
        'id_kelas',
        'id_spp',
        'nis',
        'nisn',
        'nama_siswa',
        'hp',
        'alamat',
    ];    
    
    protected $dates = ['deleted_at'];

    public function spp()
    {
        return $this->belongsTo(SPP::class, 'id_spp');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_siswa', 'id_siswa');
    }
    
}
