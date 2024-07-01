<nav class="border-b border-gray-100 bg-primary" x-data="{ open: false }">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto max-w-full px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 justify-between">
            <div class="flex shrink-0 items-center">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
            </div>
            <div class="flex">
                <!-- Logo -->

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    @php
                        $role = Auth::user()->getRoleNames()->first();
                    @endphp
                    @switch($role)
                        @case('director')
                            <x-nav-link :href="route('director.employee.index')" :active="request()->routeIs('director.employee.*')">
                                {{ __('Data Karyawan') }}
                            </x-nav-link>
                            <x-nav-link :href="route('director.buy.index')" :active="request()->routeIs('director.buy.*')">
                                {{ __('Data Pembelian') }}
                            </x-nav-link>
                            <x-nav-link :href="route('director.sell.index')" :active="request()->routeIs('director.sell.*')">
                                {{ __('Data Penjualan') }}
                            </x-nav-link>
                        @break

                        @case('sales')
                            <x-nav-link :href="route('sales.car.index')" :active="request()->routeIs('sales.car.*')">
                                {{ __('Data Mobil') }}
                            </x-nav-link>
                            <x-nav-link :href="route('sales.sales.index')" :active="request()->routeIs('sales.sales.*')">
                                {{ __('Data Pembelian Barang') }}
                            </x-nav-link>
                        @break

                        @case('frontdesk')
                            <x-nav-link :href="route('frontdesk.customer_orders.index')" :active="request()->routeIs('frontdesk.customer_orders.*')">
                                {{ __('Pesanan Pelanggan') }}
                            </x-nav-link>
                        @break

                        @case('sparepart')
                            <x-nav-link :href="route('frontdesk.customer_orders.index')" :active="request()->routeIs('frontdesk.customer_orders.*')">
                                {{ __('Pesanan Pelanggan') }}
                            </x-nav-link>
                        @break

                        @default
                            <p>Anda tidak memiliki peran yang ditentukan.</p>
                    @endswitch

                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:ms-6 sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center rounded-md border border-transparent px-3 py-2 text-sm font-medium leading-4 text-white transition duration-150 ease-in-out hover:text-secondary focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none"
                    @click="open = ! open">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path class="inline-flex" :class="{ 'hidden': open, 'inline-flex': !open }"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path class="hidden" :class="{ 'hidden': !open, 'inline-flex': open }" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div class="hidden sm:hidden" :class="{ 'block': open, 'hidden': !open }">
        <div class="space-y-1 pb-3 pt-2">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="border-t border-gray-200 pb-1 pt-4">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
