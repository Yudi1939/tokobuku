<x-admin-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight"></h2>

    <div class="shadow px-6 py-4 bg-white rounded sm:px-16 sm:py-16">
        <div class="container mx-auto">
            <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="px-2 py-8 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-6 sm:col-span-3">
                            <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                            <input 
                                type="text" 
                                id="judul" 
                                name="judul"
                                placeholder="judul" 
                                required
                                value="{{ old('judul') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            >
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                            <input 
                                type="text" 
                                id="kategori" 
                                name="kategori" 
                                placeholder="Kategori" 
                                required
                                value="{{ old('kategori') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            >
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <input 
                                type="text" 
                                name="deskripsi" 
                                id="deskripsi" 
                                placeholder="deskripsi" 
                                required
                                value="{{ old('deskripsi') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            >
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis</label>
                            <input 
                                type="text" 
                                id="penulis" 
                                name="penulis" 
                                placeholder="penulis" 
                                required
                                value="{{ old('penulis') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            >
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="penerbit" class="block text-sm font-medium text-gray-700">Penerbit</label>
                            <input 
                                type="text" 
                                id="penerbit" 
                                name="penerbit" 
                                placeholder="penerbit" 
                                required
                                value="{{ old('penerbit') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            >
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                            <input 
                                type="number" 
                                id="harga" 
                                name="harga" 
                                placeholder="harga" 
                                required
                                value="{{ old('harga') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            >
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="stok" class="block text-sm font-medium text-gray-700">Stok</label>
                            <input 
                                type="number" 
                                id="stok" 
                                name="stok" 
                                placeholder="stok" 
                                required
                                value="{{ old('stok') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            >
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="image" class="block text-sm font-medium text-gray-700">Gambar</label>
                            <input 
                                type="file" 
                                name="image" 
                                id="image"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                            >
                        </div>                                                

                    </div>
                </div>

                <hr>

                <!-- Tombol Submit -->
                <div class="px-4 py-3 bg-white text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center w-24 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md ring bg-indigo-600 hover:bg-indigo-700 text-white">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>