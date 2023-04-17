<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = "tbl_transaksi";
    protected $primaryKey = "id_transaksi";

    protected $fillable = [
        'id_siswa',
        'id_admin',
        'tanggal',
        'total_bayar',
        'sisa_bayar',
        'kembali',
        'bulan',
    ];
    
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin');
    }
}
