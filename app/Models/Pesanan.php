<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_buku',
        'id_user',
        'jumlah',
        'total',
        'status',
    ];

    public function buku(){
        return $this->belongsTo(Buku::class,'id_buku','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'id_user','id');
    }
}
