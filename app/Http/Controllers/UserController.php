<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::orderBy('terjual', 'desc')->paginate(4);
        return view('frontpage.home', compact('buku'));
    }

    public function showDetail(string $id)
    {
        $buku= Buku::find($id);
        return view('frontpage.detail', compact('buku'));
    }

    public function pesanan(string $id, int $jumlah)
    { 
        $buku= Buku::find($id);

        Pesanan::create([
            'id_buku'=> $buku->id,
            'id_user'=> Auth::id(),
            'jumlah'=> $jumlah,
            'total'=> $jumlah*$buku->harga,
        ]);

        $buku->update([
            'terjual'=>$buku->terjual + $jumlah,
            'stok'=>$buku->stok - $jumlah
        ]);

        return redirect()->route('home');
    }
}
