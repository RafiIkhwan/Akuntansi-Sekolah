<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPP extends Model
{
    use HasFactory;

    protected $table = "tbl_spp";
    protected $primaryKey = "id_spp";

    protected $fillable = [
        'tahun_ajaran',
        'biaya',
    ];
}
