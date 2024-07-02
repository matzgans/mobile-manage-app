<x-app-layout>

    <div class="py-12">
        <div class="mx-auto max-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-2xl font-bold">

                        {{ __('Tambah Data Pembelian') }}
                    </div>
                    <div class="grid gap-4 lg:grid-cols-2">
                        <div class="mt-4 w-full">
                            <form class="mx-auto max-w-full" action="{{ route('bendahara.sell.store') }}" method="POST">
                                @csrf
                                <div class="mb-3 w-full">
                                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                        for="code">Code</label>
                                    <div class="relative">
                                        <input
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                            id="code" name="code" type="string" placeholder="Masukan Kode">
                                    </div>
                                </div>
                                <div class="mb-3 w-full">
                                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                        for="sell_data">Tanggal Penjualan</label>
                                    <div class="relative">
                                        <input
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                            id="sell_data" name="sale_date" type="date">
                                    </div>
                                </div>
                                <div class="mb-3 w-full">
                                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                        for="order">Jumlah Order</label>
                                    <div class="relative">
                                        <input
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                            id="order" name="unit" type="number"
                                            placeholder="Masukan Jumlah Order">
                                    </div>
                                </div>
                                <div class="mb-3 w-full">
                                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                        for="price">Harga</label>
                                    <div class="relative">
                                        <input
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                            id="price" name="price" type="number" placeholder="Masukan Harga">
                                    </div>
                                </div>
                                <div class="mb-3 grid w-full gap-3 lg:grid-cols-2">

                                    <a class="mb-2 me-2 flex items-center justify-center rounded-lg border border-secondary bg-white px-5 py-2.5 text-sm font-medium text-secondary hover:bg-gray-100 hover:text-orange-400 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700"
                                        href="{{ route('bendahara.sell.index') }}">Kembali</a>
                                    <button
                                        class="dark:focus:ring-[#3b5998]/55 text-nowrap mb-2 me-2 inline-flex items-center justify-center rounded-lg bg-secondary px-5 py-3.5 text-center text-sm font-medium text-white hover:bg-orange-400 focus:outline-none focus:ring-4 focus:ring-[#3b5998]/50"
                                        type="submit">
                                        <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>

                                        Tambah Penjualan
                                    </button>
                                </div>
                            </form>


                        </div>
                        <div>
                            <img src="{{ asset('/image/create-image.png') }}" srcset="" alt=""
                                width="100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('after-scripts')
        <script>
            // SweetAlert for success and error messages
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    timer: 3000,
                    showConfirmButton: false
                });
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',

                        text: '{{ $error }}',

                    });
                @endforeach
            @endif

            // validate delete
            function confirmDelete(itemId) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit the form or send an AJAX request to delete the item
                        document.getElementById('delete-form-' + itemId).submit();
                    }
                });
            }
        </script>
    @endpush
</x-app-layout>
