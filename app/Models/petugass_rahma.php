<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class petugass_rahma extends Model
{
    protected $fillable = [
        'id_petugas', 'nama_petugas','username','password','telp','level','user_id'
    ];

    protected $primaryKey = 'id_petugas';

    protected $table='petugass_rahmas';
    // use HasFactory;
}
