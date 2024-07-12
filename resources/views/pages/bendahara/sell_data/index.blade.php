<x-app-layout>

    <div class="py-12">
        <div class="mx-auto max-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-2xl font-bold">

                        {{ __('Data Penjualan Barang') }}
                    </div>
                    <div class="mt-3 flex">
                        <div class="me-3 w-full">

                            <form class="max-w-full" action="{{ route('bendahara.sell.index') }}">
                                <label class="sr-only mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="default-search">Search</label>
                                <div class="relative">
                                    <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-4 ps-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                        id="default-search" name="search" type="search"
                                        value="{{ request('search') }}" placeholder="Masukan Kode Mobil" />
                                    <button
                                        class="absolute bottom-2.5 end-2.5 rounded-lg bg-secondary px-4 py-2 text-sm font-medium text-white hover:bg-orange-400 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        type="submit">Search</button>
                                </div>
                            </form>

                        </div>



                    </div>

                </div>
                <div class="relative overflow-x-auto px-6 pb-3">
                    <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                        <thead class="bg-primary text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr class="border text-white">
                                <th class="px-6 py-3" scope="col">
                                    No
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Nama
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Nomor HP
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Alamat
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Kode Mobil
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Unit
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Harga
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    Total Nominal
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($sales)
                                @foreach ($sales as $key => $sale)
                                    <tr class="border bg-white dark:border-gray-700 dark:bg-gray-800">
                                        <th class="px-6 py-4">
                                            {{ ($sales->currentPage() - 1) * $sales->perPage() + $loop->iteration }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $sale->customer->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $sale->customer->phone }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $sale->customer->address }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $sale->car->code }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $sale->unit }}
                                        </td>
                                        <td class="text-nowrap px-6 py-4">
                                            {{ 'Rp ' . number_format((float) $sale->price, 0, ',', '.') }}
                                        </td>
                                        <td class="text-nowrap px-6 py-4">
                                            {{ 'Rp ' . number_format((float) $sale->price * $sale->unit, 0, ',', '.') }}
                                        </td>

                                    </tr>
                                @endforeach
                            @else
                                <p>Data Tidak Tersedia</p>
                            @endif

                        </tbody>
                    </table>
                    <div class="mt-3">

                        {{ $sales->links() }}
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
        </script>
    @endpush
</x-app-layout>
