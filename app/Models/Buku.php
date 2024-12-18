<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'kategori',
        'deskripsi',
        'penulis',
        'penerbit',
        'harga',
        'stok',
        'status',
        'id_toko'
    ];

    public function toko()
    {
        return $this->belongsTo(Toko::class,'id_toko','id');
    }
}
