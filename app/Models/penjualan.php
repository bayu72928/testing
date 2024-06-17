<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    use HasFactory;
    protected $table = 'penjualan';
    protected $fillable = [
        'tempat', 
        'tanggal', 
        'berat', 
        'harga', 
        'total', 
        'keterangan',
        'tanam_id'
    ];
    public function tanam()
    {
        return $this->belongsTo(Tanam::class, 'tanam_id');
    }
}
