<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{

    protected $fillable = [
        'id_role', 'nama_role'
    ];

    protected $table='roles';
    use HasFactory;
}
