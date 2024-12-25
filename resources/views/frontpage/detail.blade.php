<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bookstore</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <?php $qty=1; ?>
</head>
<body>
    <section class="p-6 bg-gray-100 min-h-screen flex justify-center items-center">
        <div class="w-full max-w-4xl bg-white border border-gray-300 rounded-lg shadow-lg flex">
            <!-- Bagian Gambar -->
            <div class="w-1/3 p-4 flex items-center justify-center">
                <img src="{{ asset($buku->path.$buku->image) }}" alt="Book Cover" class="w-full h-auto max-w-[150px]">
            </div>
    
            <!-- Bagian Deskripsi -->
            <div class="w-2/3 p-4">
                <p class="text-sm text-gray-500 mb-2">{{ $buku->kategori }}</p>
                <h2 class="text-2xl font-bold mb-4">{{ $buku->judul }}</h2>
                <div>
                    <p class="text-gray-700 text-sm line-clamp-3 mb-2" id="deskripsi">{{ $buku->deskripsi }}</p>
                    <button
                        class="text-blue-500 text-sm font-medium hover:underline"
                        id="toggleDeskripsi">
                        Selengkapnya
                    </button>
                </div>
                <p class="text-gray-700 mt-4"><span class="font-semibold">Penulis:</span>{{ $buku->penulis }}</p>
                <p class="text-gray-700"><span class="font-semibold">Penerbit:</span>{{ $buku->penerbit }}</p>
                <p class="text-xl font-bold text-gray-800 mt-4">Rp {{ number_format($buku->harga, 0, ',', '.') }}</p>
                <p class="text-gray-700 mt-2"><span class="font-semibold">Stok:</span> 145</p>
    
                <!-- Bagian Jumlah Pembelian -->
                <div class="mt-4 flex flex-col items-start">
                    <p class="text-gray-700">Jumlah Pembelian</p>
                    <div class="flex items-center">
                        <button
                            class="bg-gray-300 text-gray-700 px-2 py-1 rounded-l"
                            type="button"
                            id="decreaseQty" action="{{ $qty-- }}">-</button>
                        <input
                            type="number"
                            name="jumlah"
                            value="1"
                            class="w-20 text-center border border-gray-300 focus:outline-none"
                            id="qtyInput" min="1">
                        <button
                            class="bg-gray-300 text-gray-700 px-2 py-1 rounded-r"
                            type="button"
                            id="increaseQty" action="{{ $qty++ }}">+</button>
                    </div>
                </div>
    
                <!-- Tombol Keranjang dan Pesan -->
                <div class="flex mt-6 gap-4">
                    <a href="{{ route('home') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                        Kembali
                    </a>
                    <a href="{{ route('pesanan', ['id' => $buku->id, 'jumlah' => $qty]) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                        Pesan
                    </a>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('toggleDeskripsi').addEventListener('click', function () {
            const deskripsi = document.getElementById('deskripsi');
            const btn = this;
    
            if (deskripsi.classList.contains('line-clamp-3')) {
                deskripsi.classList.remove('line-clamp-3');
                btn.textContent = 'Tampilkan lebih sedikit';
            } else {
                deskripsi.classList.add('line-clamp-3');
                btn.textContent = 'Selengkapnya';
            }
        });
    
        // Mengontrol jumlah pembelian
        document.getElementById('decreaseQty').addEventListener('click', function () {
            const qtyInput = document.getElementById('qtyInput');
            let currentValue = parseInt(qtyInput.value);
            if (currentValue > 1) {
                qtyInput.value = currentValue - 1;
            }
        });
    
        document.getElementById('increaseQty').addEventListener('click', function () {
            const qtyInput = document.getElementById('qtyInput');
            let currentValue = parseInt(qtyInput.value);
            qtyInput.value = currentValue + 1;
        });
    </script>
</body>
</html>