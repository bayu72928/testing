<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class panen extends Model
{
    use HasFactory;

    protected $table = 'panen';
    protected $fillable = [
        'tanggal', 
        'berat', 
        'keterangan',
        'tanam_id',
    ];
}
