<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-full sm:px-6 lg:px-8">
            <div class="overflow-x-auto bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-2xl font-bold">
                        {{ __('Data Pembelian') }}
                    </div>
                    <div class="mt-3 flex">
                        <div class="me-3 w-full">
                            <form class="max-w-full" action="{{ route('bendahara.buy.index') }}">
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
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-4 ps-10 text-sm text-gray-900 focus:border-secondary focus:ring-secondary dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-secondary dark:focus:ring-secondary"
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
                <div class="overflow-x-auto px-6 pb-3">
                    <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                        <thead class="bg-primary text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr class="border text-white">
                                <th class="px-6 py-3" scope="col">No</th>
                                <th class="px-6 py-3" scope="col">Code Barang</th>
                                <th class="px-6 py-3" scope="col">Tanggal Pembelian</th>
                                <th class="px-6 py-3" scope="col">Per Unit</th>
                                <th class="px-6 py-3" scope="col">Harga (Rp)</th>
                                <th class="px-6 py-3" scope="col">Total Nominal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($buys)
                                @foreach ($buys as $key => $buy)
                                    <tr class="border bg-white dark:border-gray-700 dark:bg-gray-800">
                                        <td class="px-6 py-4">
                                            {{ ($buys->currentPage() - 1) * $buys->perPage() + $loop->iteration }}
                                        </td>

                                        <td class="px-6 py-4">{{ $buy->code }}</td>
                                        <td class="px-6 py-4">{{ $buy->buying_date }}</td>
                                        <td class="px-6 py-4">{{ $buy->unit }}</td>
                                        <td class="text-nowrap px-6 py-4">
                                            {{ 'Rp ' . number_format((float) $buy->price, 0, ',', '.') }}</td>
                                        <td class="text-nowrap px-6 py-4">
                                            {{ 'Rp ' . number_format((float) $buy->price * $buy->unit, 0, ',', '.') }}
                                        </td>

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="px-6 py-4 text-center" colspan="6">Data Tidak Tersedia</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $buys->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('after-scripts')
        <script>
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
                        document.getElementById('delete-form-' + itemId).submit();
                    }
                });
            }
        </script>
    @endpush
</x-app-layout>
