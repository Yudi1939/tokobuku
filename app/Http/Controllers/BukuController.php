<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bukus = Buku::all();

        return view('admin.inputbuku', compact( 'bukus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $message = [
        'required' => 'Kolom :attribute harus lengkap',
        'numeric' => 'Kolom :attribute harus angka',
        'mimes' => 'Perhatikan format dan ukuran data gambar (hanya png, jpg, max 1MB)',
    ];

    $validasi = $request->validate([
        'judul' => 'required',
        'kategori' => 'required',
        'deskripsi' => 'required',
        'penulis' => 'required',
        'penerbit' => 'required',
        'harga' => 'required|numeric',
        'stok' => 'required|numeric',
        'image' => 'required|mimes:png,jpg|max:1024',
    ], $message);

    try {
        if ($request->file('image')) {
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('cover', $fileName, 'public');
            $validasi['image'] = $path;
        }

        $response = Buku::create($validasi);
        return redirect('admin/daftarbuku')->with('success', 'Data berhasil disimpan!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => $e->getMessage()]);
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
