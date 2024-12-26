<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian - Bookstore</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-50 min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white shadow-md py-4 px-6 flex items-center justify-between">
        <a href="{{ route('home') }}" class="text-xl font-bold text-gray-800">📚 Bookstore.com</a>
        <div class="flex items-center gap-4">
            <select class="border p-2 rounded-md">
                <option>Kategori</option>
                <option>Fiksi</option>
                <option>Non-Fiksi</option>
                <option>Bisnis</option>
            </select>
            <div class="relative">
                <input type="text" placeholder="Cari buku..." class="border p-2 rounded-md pl-10">
                <span class="absolute left-2 top-2 text-gray-400">🔍</span>
            </div>
            <a href="#" class="text-gray-700 text-xl">🛒</a>
            <div class="relative">
                <button class="bg-blue-500 text-white px-3 py-1 rounded-md">User ▾</button>
                <!-- Dropdown User (Optional) -->
            </div>
        </div>
    </nav>

    <!-- Hasil Pencarian -->
    <div class="container mx-auto mt-6 px-4">
        <h2 class="text-2xl font-bold mb-4">Hasil Pencarian untuk: <span class="text-blue-500">"The Psychology of Money"</span></h2>
        
        <!-- Daftar Produk -->
        <div class="space-y-4">
            @foreach ($hasilPencarian as $buku)
            <div class="flex items-center justify-between border-b pb-4">
                <div class="flex items-center gap-4">
                    <img src="{{ asset($buku->path.$buku->image) }}" alt="Cover Buku" class="w-24 h-32 object-cover rounded-md shadow-md">
                    <div>
                        <h3 class="text-xl font-semibold">{{ $buku->judul }}</h3>
                        <p class="text-gray-600">Penulis: {{ $buku->penulis }}</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-xl font-bold text-gray-800">Rp {{ number_format($buku->harga, 0, ',', '.') }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Jika Tidak Ada Hasil -->
        @if($hasilPencarian->isEmpty())
        <p class="text-center text-gray-500 mt-8">Tidak ada hasil yang ditemukan untuk kata kunci yang Anda masukkan.</p>
        @endif
    </div>

    <!-- Footer -->
    <footer class="mt-10 bg-white shadow-md py-4 text-center text-gray-600 text-sm">
        © {{ date('Y') }} Bookstore.com. All rights reserved.
    </footer>

</body>
</html>