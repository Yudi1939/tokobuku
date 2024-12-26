<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center">

    <!-- Navbar -->
    <nav class="bg-white shadow-md w-full">
        <div class="container mx-auto flex justify-between items-center p-4">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-800 hover:text-gray-600">🏠 Home</a>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg overflow-hidden mt-6">
        <!-- Header Tabel -->
        <h2 class="text-2xl font-bold text-gray-800 text-center py-4 bg-gray-200">📦 Riwayat Pesanan</h2>
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-300 text-gray-700">
                    <th class="p-3 text-left">Produk</th>
                    <th class="p-3 text-center">Jumlah</th>
                    <th class="p-3 text-center">Total</th>
                    <th class="p-3 text-center">Status</th>
                    <th class="p-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanan as $item)
                <tr class="border-b text-gray-700">
                    <!-- Kolom Produk -->
                    <td class="p-3 flex flex-row items-center gap-2">
                        <img src="{{ asset($item->buku->path.$item->buku->image) }}" alt="Produk" class="w-12 h-12 rounded-md">
                        <span>{{ $item->buku->judul }}</span>
                    </td>
                    <!-- Kolom Jumlah -->
                    <td class="p-3 text-center">{{ $item->jumlah }}</td>
                    <!-- Kolom Total -->
                    <td class="p-3 text-center font-bold">Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                    <!-- Kolom Status -->
                    <td class="p-3 text-center">
                        @if ($item->status == 'Menunggu Pembayaran')
                            <span class="text-yellow-500 font-medium">{{ $item->status }}</span>
                        @elseif ($item->status == 'Sedang Diproses' || $item->status == 'Dalam Pengiriman')
                            <span class="text-blue-500 font-medium">{{ $item->status }}</span>
                        @elseif ($item->status == 'Selesai')
                            <span class="text-green-500 font-medium">{{ $item->status }}</span>
                        @endif
                    </td>
                    <!-- Kolom Action -->
                    <td class="p-3 text-center">
                        @if ($item->status == 'Menunggu Pembayaran')
                            <a href="{{ route('pembayaran', ['id' => $item->id]) }}" 
                               class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600">
                                Bayar
                            </a>
                        @elseif ($item->status == 'Dalam Pengiriman' || $item->status == 'Sedang Diproses')
                            <a href="{{ route('selesaiPesanan', ['id' => $item->id]) }}" class="bg-green-500 text-white px-3 py-1 rounded-md cursor-default hover:bg-green-600">
                                Selesai
                            </a>
                        @elseif ($item->status == 'Selesai')
                            <a href="{{ route('detail', ['id' => $item->buku->id]) }}" 
                               class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">
                                Beli Lagi
                            </a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Footer -->
    <footer class="w-full text-center py-4 mt-6 text-gray-600 text-sm">
        © {{ date('Y') }} Toko Buku. All rights reserved.
    </footer>

</body>
</html>