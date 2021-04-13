<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengaduann_rahma extends Model
{
    protected $fillable = [
        'id_pengaduan', 'tgl_pengaduan','nik','isi_laporan','foto','status'
    ];

    protected $primaryKey = 'id_pengaduan';

    protected $table='pengaduann_rahmas';
    // use HasFactory;
}
