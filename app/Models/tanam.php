<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tanam extends Model
{
    use HasFactory;

    protected $table = 'tanam';
    protected $fillable = [
        'lahan', 
        'tanggal', 
        'status',
        'keterangan',
        'tanaman_id', 
    ];

    public function tanaman()
    {
        return $this->belongsTo(Tanaman::class, 'tanaman_id');
    }

    public function panen()
    {
        return $this->hasMany(Panen::class, 'tanam_id');
    }
    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'tanam_id');
    }
}
