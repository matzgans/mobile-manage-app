<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-2xl font-bold">
                        {{ __('Tambah Data') }}
                    </div>
                    <div class="grid gap-4 lg:grid-cols-2">
                        <div class="mt-4 w-full">
                            <form class="mx-auto max-w-full"
                                action="{{ route('director.employee.update', ['employee' => $employee->id]) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3 grid gap-3 lg:grid-cols-2">
                                    <div class="w-full">
                                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                            for="name">Name</label>
                                        <div class="relative">
                                            <input
                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-secondary focus:ring-secondary dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-secondary dark:focus:ring-secondary"
                                                id="name" name="name" type="text"
                                                value="{{ $employee->name }}" placeholder="Masukan Nama">
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                            for="email">Email</label>
                                        <div class="relative">
                                            <input
                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-secondary focus:ring-secondary dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-secondary dark:focus:ring-secondary"
                                                id="email" name="email" type="email"
                                                value="{{ $employee->email }}" placeholder="Masukan Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 w-full">
                                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                        for="id_card">Id Card</label>
                                    <div class="relative">
                                        <input
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-secondary focus:ring-secondary dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-secondary dark:focus:ring-secondary"
                                            id="id_card" name="id_card" type="number"
                                            value="{{ $employee->id_card }}" placeholder="Masukan Id Card">
                                    </div>
                                </div>
                                <div class="mb-3 w-full">
                                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                        for="id_card">Tempat Lahir</label>
                                    <div class="relative">
                                        <input
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-secondary focus:ring-secondary dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-secondary dark:focus:ring-secondary"
                                            id="id_card" name="place_birth" type="string"
                                            value="{{ $employee->place_birth }}" placeholder="Masukan Tempat Lahir">
                                    </div>
                                </div>
                                <div class="mb-3 w-full">
                                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                        for="birth_place_date">Tanggal Lahir</label>
                                    <div class="relative">
                                        <input
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-secondary focus:ring-secondary dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-secondary dark:focus:ring-secondary"
                                            id="birth_place_date" name="date_birth" type="date"
                                            value="{{ $employee->date_birth }}" placeholder="Masukan Tanggal Lahir">
                                    </div>
                                </div>
                                <div class="mb-3 grid gap-3 lg:grid-cols-2">
                                    <div class="w-full">
                                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                            for="religion">Agama</label>
                                        <select
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-secondary focus:ring-secondary dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-secondary dark:focus:ring-secondary"
                                            id="religion" name="religion" value="{{ $employee->religion }}">
                                            <option value="Islam"
                                                {{ $employee->religion == 'Islam' ? 'selected' : '' }}>Islam</option>
                                            <option value="Kristen"
                                                {{ $employee->religion == 'Kristen' ? 'selected' : '' }}>Kristen
                                            </option>
                                            <option value="Katolik"
                                                {{ $employee->religion == 'Katolik' ? 'selected' : '' }}>Katolik
                                            </option>
                                            <option value="Hindu"
                                                {{ $employee->religion == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                            <option value="Budha"
                                                {{ $employee->religion == 'Budha' ? 'selected' : '' }}>Budha</option>
                                            <option value="Konghucu"
                                                {{ $employee->religion == 'Konghucu' ? 'selected' : '' }}>Konghucu
                                            </option>
                                        </select>
                                    </div>
                                    <div class="w-full">
                                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                            for="phone">Nomor HP</label>
                                        <div class="relative">
                                            <input
                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-secondary focus:ring-secondary dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-secondary dark:focus:ring-secondary"
                                                id="phone" name="phone" type="number"
                                                value="{{ gettype($employee->phone) == 'string' ? intval(str_replace(['-', '+', ')', '(', ' '], '', $employee->phone)) : $employee->phone }}"
                                                placeholder="Masukan Nomor HP">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 grid gap-3 lg:grid-cols-2">
                                    <div class="w-full">
                                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                            for="education">Pendidikan Terakhir</label>
                                        <select
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-secondary focus:ring-secondary dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-secondary dark:focus:ring-secondary"
                                            id="education" name="education">
                                            <option value="SD">SD</option>
                                            <option value="SMP">SMP</option>
                                            <option value="SMA">SMA</option>
                                            <option value="D3">D3</option>
                                            <option value="S1">S1</option>
                                            <option value="S2">S2</option>
                                            <option value="S3">S3</option>
                                        </select>
                                    </div>
                                    <div class="w-full">
                                        <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                            for="salary">Gaji</label>
                                        <div class="relative">
                                            <input
                                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-secondary focus:ring-secondary dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-secondary dark:focus:ring-secondary"
                                                id="salary" name="salary" type="number"
                                                value="{{ $employee->salary }}" placeholder="Masukan Gaji">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 w-full">
                                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                        for="division">Divisi</label>
                                    <select
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-secondary focus:ring-secondary dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-secondary dark:focus:ring-secondary"
                                        id="division" name="devision">
                                        <option value="Directur"
                                            {{ $employee->devision == 'Director' ? 'selected' : '' }}>Directur</option>
                                        <option value="Marketing"
                                            {{ $employee->devision == 'Marketing' ? 'selected' : '' }}>Marketing
                                        </option>
                                        <option value="Frontdesk"
                                            {{ $employee->devision == 'Frontdesk' ? 'selected' : '' }}>Frontdesk
                                        </option>
                                        <option value="Sparepart"
                                            {{ $employee->devision == 'Sparepart' ? 'selected' : '' }}>Sparepart
                                        </option>
                                        <option value="Bendahara"
                                            {{ $employee->devision == 'Bendahara' ? 'selected' : '' }}>Bendahara
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3 w-full">
                                    <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"
                                        for="address">Alamat</label>
                                    <div class="relative">
                                        <textarea
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-secondary focus:ring-secondary dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-secondary dark:focus:ring-secondary"
                                            id="address" name="address" value="{{ $employee->address }}" placeholder="Masukan Alamat">{{ $employee->address }}</textarea>
                                    </div>
                                </div>
                                <div class="mb-3 grid w-full gap-3 lg:grid-cols-2">
                                    <a class="mb-2 me-2 flex items-center justify-center rounded-lg border border-secondary bg-white px-5 py-2.5 text-sm font-medium text-secondary hover:bg-gray-100 hover:text-orange-400 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700"
                                        href="{{ route('director.employee.index') }}">Kembali</a>
                                    <button
                                        class="mb-2 me-2 flex items-center justify-center rounded-lg border border-secondary bg-secondary px-5 py-2.5 text-sm font-medium text-white hover:bg-orange-400 focus:z-10 focus:outline-none focus:ring-4 focus:ring-blue-200 dark:border-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-700"
                                        type="submit">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                        <div>
                            <img class="mx-auto my-auto max-w-full"
                                src="{{ asset('assets/images/create-image-employee.png') }}" alt="register">
                        </div>
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
        </script>
    @endpush
</x-app-layout>
