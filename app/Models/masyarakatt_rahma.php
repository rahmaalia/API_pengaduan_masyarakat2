<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masyarakatt_rahma extends Model
{

    protected $fillable = [
        'nik', 'nama','username','password','telp','user_id'
    ];

    protected $table='masyarakatt_rahmas';
    // use HasFactory;
}
