<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Pesanan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan Daftar Buku
    public function index()
    {
        $jumlahPengguna = User::count(); // Menghitung total pengguna
        $jumlahToko = Pesanan::count(); // Menghitung total toko
        $jumlahBuku = Buku::count(); // Menghitung total buku
        $data = Buku::all(); // Mengambil data buku
        return view('admin.daftarbuku', compact('data', 'jumlahPengguna', 'jumlahToko', 'jumlahBuku'));
    }

    // Menampilkan Daftar Pengguna
    public function users()
    {
        $jumlahPengguna = User::count(); // Menghitung total pengguna
        $jumlahToko = Pesanan::count(); // Menghitung total toko
        $jumlahBuku = Buku::count(); // Menghitung total buku
        $users = User::all(); // Mengambil semua pengguna dari database
        return view('admin.daftaruser', compact('users', 'jumlahPengguna', 'jumlahToko', 'jumlahBuku'));
    }

    public function bayar()
    {
        $jumlahPengguna = User::count(); // Menghitung total pengguna
        $jumlahToko = Pesanan::count(); // Menghitung total toko
        $jumlahBuku = Buku::count(); // Menghitung total buku
        $bayar = Pembayaran::all(); // Mengambil semua pengguna dari database
        return view('admin.daftarbayar', compact('bayar', 'jumlahPengguna', 'jumlahToko', 'jumlahBuku'));
    }

    public function pesan()
    {
        $jumlahPengguna = User::count(); // Menghitung total pengguna
        $jumlahToko = Pesanan::count(); // Menghitung total toko
        $jumlahBuku = Buku::count(); // Menghitung total buku
        $pesan = Pesanan::all(); // Mengambil semua pengguna dari database
        return view('admin.daftarpesan', compact('pesan', 'jumlahPengguna', 'jumlahToko', 'jumlahBuku'));
    }
}
