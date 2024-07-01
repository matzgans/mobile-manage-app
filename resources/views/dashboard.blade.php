<x-app-layout>

    <div class="py-12">
        <div class="mx-auto max-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @php
                        $role = Auth::user()->getRoleNames()->first();
                    @endphp
                    @switch($role)
                        @case('director')
                            {{ __("You're logged in! Directur") }}
                        @break

                        @case('sales')
                            {{ __("You're logged in! Marketing") }}
                        @break

                        @case('frontdesk')
                            {{ __("You're logged in! FrontDesk") }}
                        @break

                        @case('sparepart')
                            {{ __("You're logged in! Sparepart") }}
                        @break

                        @case('bendahara')
                            {{ __("You're logged in! Bendahara") }}
                        @break

                        @default
                            <p>Anda tidak memiliki peran yang ditentukan.</p>
                    @endswitch
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
