<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore.com</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .slide {
            display: none;
        }
        .active {
            display: block;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-200">

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

    <!-- Banner Slideshow -->
    <section class="relative mt-4 overflow-hidden">
        <div class="w-full h-96 relative">
            <!-- Slide 1 -->
            <div class="slide active absolute inset-0 transition-opacity duration-1000 mr-4">
                <img src="{{ asset('banner/banner1.jpg') }}" alt="Banner 1" class="mx-2 rounded-lg w-full h-96">
                {{-- <div class="absolute top-0 right-0 bg-red-500 text-white p-2">*HANYA UNTUK 10 ORANG</div> --}}
            </div>
            <!-- Slide 2 -->
            <div class="slide absolute inset-0 transition-opacity duration-1000 mr-4">
                <img src="{{ asset('banner/banner2.png') }}" alt="Banner 2" class="mx-2 rounded-lg w-full h-96">
                {{-- <div class="absolute top-0 right-0 bg-green-500 text-white p-2">*PROMO AKHIR TAHUN</div> --}}
            </div>
            <!-- Slide 3 -->
            <div class="slide absolute inset-0 transition-opacity duration-1000 mr-4">
                <img src="{{ asset('banner/banner3.jpg') }}" alt="Banner 3" class="mx-2 rounded-lg w-full h-96">
                {{-- <div class="absolute top-0 right-0 bg-blue-500 text-white p-2">*DISKON SPESIAL</div> --}}
            </div>
        </div>
    </section>

    <!-- Buku Terlaris -->
    <section class="mt-8 px-4">
        <h2 class="text-xl font-semibold mb-4">Buku Terlaris</h2>
        <div class="ml-10 grid grid-cols-4">
            @foreach ($buku as $item)
                <a href="{{ route('detail', $item->id) }}" class="p-4 border border-black rounded-lg flex flex-col w-48 justify-between">
                    <img src="{{ asset($item->path.$item->image) }}" alt="Book Cover" class="w-32 h-40 mx-auto">
                    <p class="text-sm mt-2 flex flex-wrap justify-start">{{ $item->penulis }}</p>
                    <h3 class="font-semibold flex flex-wrap justify-start">{{ $item->judul }}</h3>
                    <div class="flex flex-row justify-between mt-2 items-center">
                        <p class="text-lg font-bold">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                        <p class="text-gray-500 text-sm">
                            @if ($item->terjual >= 1000000)
                                {{ floor($item->terjual / 1000000) }}JT
                            @elseif ($item->terjual >= 10000)
                                {{ floor($item->terjual / 1000) }}RB
                            @elseif ($item->terjual >= 1000)
                                {{ floor($item->terjual / 1000) }}RB
                            @else
                                {{ $item->terjual }}
                            @endif
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <!-- Trending Pekan Ini -->
    <section class="mt-8 px-4">
        <h2 class="text-xl font-semibold mb-4">Trending Pekan Ini</h2>
        <div class="ml-10 grid grid-cols-4">
            @foreach ($poin as $item)
                <a href="{{ route('detail', $item->id) }}" class="p-4 border border-black rounded-lg flex flex-col w-48 justify-between">
                    <img src="{{ asset($item->path.$item->image) }}" alt="Book Cover" class="w-32 h-40 mx-auto">
                    <p class="text-sm mt-2 flex flex-wrap justify-start">{{ $item->penulis }}</p>
                    <h3 class="font-semibold flex flex-wrap justify-start">{{ $item->judul }}</h3>
                    <div class="flex flex-row justify-between mt-2 items-center">
                        <p class="text-lg font-bold">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                        <p class="text-gray-500 text-sm">
                            @if ($item->terjual >= 1000000)
                                {{ floor($item->terjual / 1000000) }}JT
                            @elseif ($item->terjual >= 10000)
                                {{ floor($item->terjual / 1000) }}RB
                            @elseif ($item->terjual >= 1000)
                                {{ floor($item->terjual / 1000) }}RB
                            @else
                                {{ $item->terjual }}
                            @endif
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <!-- Footer -->
    <footer class="mt-8 bg-gray-800 text-white p-4 text-center">
        <div class="grid grid-cols-3 gap-4">
            <div>
                <h4 class="font-semibold">Informasi Berbelanja</h4>
                <p>Berbelanja</p>
                <p>Pengiriman</p>
                <p>Pembayaran</p>
            </div>
            <div>
                <h4 class="font-semibold">Tentang Bookstore.com</h4>
                <p>Tentang Kami</p>
            </div>
            <div>
                <h4 class="font-semibold">Media Sosial</h4>
                <p>Instagram</p>
                <p>Facebook</p>
                <p>Gmail</p>
            </div>
        </div>
        <p class="mt-4">&copy; 2024 Bookstore.com</p>
    </footer>

    <!-- JavaScript untuk Slideshow -->
    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');
        
        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.remove('active');
                if (i === index) {
                    slide.classList.add('active');
                }
            });
        }
        
        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }
        
        setInterval(nextSlide, 3000); // Ganti slide setiap 3 detik
    </script>

</body>
</html>