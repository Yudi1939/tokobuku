<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    public $primaryKey = 'id';

    protected $table = "bukus";

    protected $fillable = [
        'judul',
        'kategori',
        'deskripsi',
        'penulis',
        'penerbit',
        'harga',
        'stok',
        'image',
    ];
}
