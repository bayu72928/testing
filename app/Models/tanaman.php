<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tanaman extends Model
{
    use HasFactory;
    protected $table = 'tanaman';
    protected $fillable = [
        'nama', 
        'jenis', 
        'keterangan',
    ];
}
