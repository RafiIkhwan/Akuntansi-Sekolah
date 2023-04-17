<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $table = "tbl_detail";
    protected $primaryKey = "id_detail";

    protected $fillable = [
        'id_transaksi',
        'id_ssp',
        'jumlah_bayar',
        'sisa',
        'keterangan',
    ];
}
