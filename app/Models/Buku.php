<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'judul',
        'kategori',
        'deskripsi',
        'penulis',
        'penerbit',
        'harga',
        'stok'
    ];
}
