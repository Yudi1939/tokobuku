<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pembayaran</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

    <form id="payment-form" action="{{ route('storePembayaran', $pesanan->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-lg rounded-xl p-8 w-full max-w-3xl">
        @csrf
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">🛒 Halaman Pembayaran</h2>

        <!-- Produk -->
        <table class="mb-6 border-b pb-4 w-full">
            <thead>
                <tr class="border-b">
                    <th class="text-left font-medium text-gray-600 py-2">Produk</th>
                    <th class="text-center font-medium text-gray-600 py-2">Jumlah</th>
                    <th class="text-right font-medium text-gray-600 py-2">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="py-2">{{ $pesanan->buku->judul }}</td>
                    <td class="text-center py-2">
                        <input type="number" 
                               id="quantity"
                               name="jumlah" 
                               value="{{ $pesanan->jumlah }}" 
                               min="1" 
                               class="w-16 text-center border rounded-md">
                    </td>
                    <td class="text-right py-2">Rp <span id="total">{{ number_format($pesanan->buku->harga * $pesanan->jumlah, 0, ',', '.') }}</span></td>
                </tr>
            </tbody>
        </table>
        
        <!-- Metode Pembayaran -->
        <div class="mb-6">
            <label class="block font-medium text-gray-600 mb-1">Metode Pembayaran</label>
            <select id="payment-method" class="w-full border rounded-md p-2" name="metode_pembayaran">
                <option value="BRI" data-rekening="0076533455667">Transfer - Bank BRI</option>
                <option value="BNI" data-rekening="0098765432101">Transfer - Bank BNI</option>
                <option value="Mandiri" data-rekening="0011223344556">Transfer - Bank Mandiri</option>
            </select>
            <p class="text-sm text-gray-500 mt-1">*Kirim pembayaran ke nomor rekening ini</p>
            <p class="font-bold text-lg mt-1" id="account-number">0076533455667</p>
        </div>

        <!-- Bukti Pembayaran -->
        <div class="mb-6">
            <label class="block font-medium text-gray-600 mb-1">Bukti Pembayaran</label>
            <input type="file" name="bukti_pembayaran" class="w-full border rounded-md p-2">
        </div>

        <!-- Tombol Aksi -->
        <div class="flex justify-end gap-4">
            <a href="{{ route('home') }}" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">Batalkan</a>
            <button type="button" onclick="confirmPayment()" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Konfirmasi</button>
        </div>
    </form>

    <!-- JavaScript untuk Dinamis Harga dan Validasi -->
    <script>
        // Harga Satuan dari Server
        const hargaSatuan = {{ $pesanan->buku->harga }};
        const quantityInput = document.getElementById('quantity');
        const totalSpan = document.getElementById('total');

        // Fungsi Menghitung Total Harga
        function updateTotal() {
            let quantity = parseInt(quantityInput.value) || 1;
            if (quantity < 1) quantity = 1; // Validasi minimal 1

            const totalHarga = hargaSatuan * quantity;
            totalSpan.textContent = totalHarga.toLocaleString('id-ID');
        }

        // Event Listener untuk Perubahan Jumlah
        quantityInput.addEventListener('input', updateTotal);
        quantityInput.addEventListener('change', updateTotal);

        // Inisialisasi Total di Awal
        updateTotal();

        // Update Nomor Rekening Berdasarkan Metode Pembayaran
        $('#payment-method').on('change', function () {
            let rekening = $(this).find(':selected').data('rekening');
            $('#account-number').text(rekening);
        });

        // SweetAlert Konfirmasi Pembayaran
        function confirmPayment() {
            Swal.fire({
                title: 'Konfirmasi Pembayaran',
                text: "Apakah Anda yakin ingin mengkonfirmasi pembayaran?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Konfirmasi!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: 'Pembayaran Anda telah dikonfirmasi.',
                        icon: 'success',
                        timer: 2000,
                        timerProgressBar: true,
                        showConfirmButton: false
                    }).then(() => {
                        document.getElementById('payment-form').submit();
                    });
                }
            });
        }
    </script>
</body>
</html>