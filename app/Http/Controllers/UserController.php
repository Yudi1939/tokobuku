<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;
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

    public function pesanan(Request $request, string $id)
    { 
        $buku= Buku::find($id);
        $massages = ([
            'required' => 'Jumlah pembelian harus diisi',
            'integer' => 'Jumlah pembelian harus berupa angka',
            'min' => 'Jumlah pembelian minimal 1',
            'max' => 'Jumlah pembelian maksimal '.$buku->stok
        ]);
        $request->validate([
            'jumlah' => 'required|integer|min:1|max:'.$buku->stok
        ], $massages);

        $pesanan=Pesanan::create([
            'id_buku'=> $buku->id,
            'id_user'=> Auth::id(),
            'jumlah'=> $request->jumlah,
            'total'=> $request->jumlah*$buku->harga,
        ]);

        $buku->update([
            'terjual'=>$buku->terjual + $request->jumlah,
            'stok'=>$buku->stok - $request->jumlah
        ]);

        return redirect()->route('pembayaran', $pesanan->id);
    }

    public function pembayaran(string $id)
    {
        $pesanan= Pesanan::find($id);
        return view('frontpage.pembayaran', compact('pesanan'));
    }

    public function pembayaranStore(Request $request, string $id)
    {
        $pesanan = Pesanan::find($id);

        $massages = ([
            'required' => 'Field harus diisi',
            'integer' => 'Jumlah pembelian harus berupa angka',
            'min' => 'Jumlah pembelian minimal 1',
            'max' => 'Jumlah pembelian maksimal '.$pesanan->buku->stok,
        ]);
        $request->validate([
            'jumlah' => 'required|integer|min:1|max:'.$pesanan->buku->stok,
            'metode_pembayaran' => 'required',
            'bukti_pembayaran' => 'required'
        ], $massages);
        
        $image = $request->file('bukti_pembayaran');
        $nameImage = time() . $image->getClientOriginalName();
        $image->storeAs('buktiPembayaran', $nameImage, 'public');

        Pembayaran::create([
            'id_pesanan' => $pesanan->id,
            'metode_pembayaran' => $request->metode_pembayaran,
            'image' => $nameImage
        ]);

        $pesanan->update([
            'jumlah' => $request->jumlah,
            'total' => $request->jumlah*$pesanan->buku->harga,
            'status' => 'Sedang Diproses'
        ]);

        return redirect()->route('home');
    }

    public function daftarPesanan() {
        $pesanan = Pesanan::where('id_user', Auth::id())->get();
        return view('frontpage.pesanan', compact('pesanan'));
    }

    public function selesaiPesanan(string $id) {
        $pesanan = Pesanan::find($id);
        $pesanan->update([
            'status' => 'Selesai'
        ]);

        return redirect()->route('daftarpesanan');
    }
}
