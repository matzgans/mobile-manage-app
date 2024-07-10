<x-landing-layout>
    <div class="max-w-96 flex flex-col">
        <div class="mb-2 flex justify-center"><x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
        </div>
        <div class="mb-3 text-center text-white">
            Lore equuntur! Architecto odio vitae hic, minus veniam nemo ullam, porro rerum sed possimus minima?
        </div>
        <div class="flex justify-center">
            @if (Route::has('login'))
                @auth
                    <a class="mb-2 me-2 w-1/2 rounded-lg bg-orange-700 py-2.5 text-center text-sm font-medium text-white hover:bg-orange-800 focus:outline-none focus:ring-4 focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800"
                        href="{{ url('/dashboard') }}">
                        Dashboard
                    </a>
                @else
                    <a class="mb-2 me-2 flex w-1/2 items-center justify-center rounded-lg bg-orange-700 py-2.5 text-xl font-medium text-white hover:bg-orange-800 focus:outline-none focus:ring-4 focus:ring-orange-300 dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800"
                        href="{{ route('login') }}">
                        <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                        </svg>

                        Login
                    </a>
                @endauth
            @endif
        </div>
    </div>
</x-landing-layout>
