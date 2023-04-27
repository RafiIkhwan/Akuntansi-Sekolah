<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "tbl_kelas";
    protected $primaryKey = "id_kelas";
    protected $fillable = [
        'nama_kelas',
        'kompetensi_keahlian',
    ];
    protected $dates = ['deleted_at'];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'id_kelas');
    }
}
