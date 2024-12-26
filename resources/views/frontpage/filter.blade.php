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
    <nav class="flex items-center justify-between px-6 py-4 bg-white shadow-md">
        <!-- Logo -->
        <h1 class="text-2xl font-bold text-gray-800">Bookstore.com</h1>
    
        <!-- Search and Filters -->
        <div class="flex items-center space-x-6">
            <!-- Kategori Dropdown -->
            <form action="{{ route('filter') }}" method="get" class="flex flex-row space-x-2">
                <select name="filter" class="border border-gray-300 rounded p-2 w-40 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option disabled selected>Kategori</option>
                    <option value="Ekonomi">Ekonomi</option>
                    <option value="Hukum">Hukum</option>
                    <option value="Sains">Sains</option>
                    <option value="Teknologi">Teknologi</option>
                </select>
                <button type="submit" class="flex items-center">
                    <img src="{{ asset('icon/filter.png') }}" alt="Search Icon" class="w-6 h-6">
                </button>
            </form>

            <!-- Search Bar -->
            <form action="{{ route('search') }}" method="get" class="flex items-center space-x-2">
                <input type="text" name="search" placeholder="Cari buku..." class="border border-gray-300 rounded p-2 w-48 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="flex items-center">
                    <img src="{{ asset('icon/search.jpg') }}" alt="Search Icon" class="w-6 h-6">
                </button>
            </form>
    
            <!-- Shopping Cart -->
            <button class="flex items-center">
                <a href="{{ route('daftarpesanan') }}"><img src="{{ asset('icon/shop.jpg') }}" alt="Cart Icon" class="w-8 h-8"></a>
            </button>
    
            <!-- User Button -->
            <button class="px-4 py-2 border border-gray-300 rounded bg-gray-100 hover:bg-gray-200 transition">
                User
            </button>
        </div>
    </nav>

    <!-- Hasil Pencarian -->
    <div class="container mx-auto mt-6 px-4">
        <h2 class="text-2xl font-bold mb-4">Hasil Kategori: <span class="text-blue-500">{{ $filterValue }}</span></h2>
        
        <!-- Daftar Produk -->
        <div class="space-y-4">
            @foreach ($datas as $buku)
            <a href="{{ route('detail', $buku->id) }}" class="flex items-center justify-between border-b pb-4">
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
            </a>
            @endforeach
        </div>

        <!-- Jika Tidak Ada Hasil -->
        @if($datas->isEmpty())
        <p class="text-center text-gray-500 mt-8">Tidak ada hasil yang ditemukan untuk kata kunci yang Anda masukkan.</p>
        @endif
    </div>

    <!-- Footer -->
    <footer class="mt-10 bg-white shadow-md py-4 text-center text-gray-600 text-sm">
        © {{ date('Y') }} Bookstore.com. All rights reserved.
    </footer>

</body>
</html>