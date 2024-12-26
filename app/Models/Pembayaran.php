<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_pesanan',
        'metode_pembayaran',
        'image',
    ];

    public function pesanan(){
        return $this->belongsTo(Pesanan::class,'id_pesanan','id');
    }
}