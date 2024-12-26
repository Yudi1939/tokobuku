<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User; // Pastikan model User diimport
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan Daftar Buku
    public function index()
    {
        $buku = Buku::all(); // Mengambil semua buku dari database
        return view('admin.daftarbuku', compact('buku')); // Menampilkan view admin-page dengan data buku
    }

    // Menampilkan form untuk menambah buku (form-create)
    public function create()
    {
        return view('admin.create-buku');
    }

    // Menyimpan buku baru ke dalam database
    public function store(Request $request)
    {
        Buku::create($request->all());
        return redirect()->route('admin.daftarbuku');
    }

    // Menampilkan form untuk mengedit buku
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('admin.edit-buku', compact('buku'));
    }

    // Mengupdate data buku
    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->update($request->all());
        return redirect()->route('admin.daftarbuku');
    }

    // Menghapus buku
    public function destroy($id)
    {
        Buku::destroy($id);
        return redirect()->route('admin.daftarbuku');
    }

    // Menampilkan Daftar Pengguna
    public function users()
    {
        $users = User::all(); // Mengambil semua pengguna dari database
        return view('admin.daftaruser', compact('users')); // Menampilkan view daftar pengguna
    }
}
