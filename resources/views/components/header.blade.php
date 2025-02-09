<header>
    <div class="flex justify-center">
        <a href="/">
            <img class="w-72 object-cover" src="{{ asset('img/banner-logo.png') }}" alt="winnicode-logo">
        </a>
        <div class="absolute top-0 left-0 hidden md:block md:pl-10 lg:pl-20 pt-5">
            <p id="current-date"></p>
            <p id="current-time"></p>
        </div>
    </div>

</header>
<div class="sticky top-0 z-10 bg-white lg:hidden">
    <div class="relative flex items-center justify-between p-4 border-b-4 border-double border-current">
        <button id="menu-toggle" class="rounded-lg p-1 text-gray-700 focus:outline-none">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M18 6H6m12 4H6m12 4H6m12 4H6" />
            </svg>
        </button>
        @if (auth()->check())
            <a href="/dashboard"
                class="rounded flex items-center gap-2 p-1 px-4 bg-green-600 text-white hover:bg-green-500 ">
                <svg class="me-1 -ms-1 w-5 h-5 text-white dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    viewBox="0 0 24 24">
                    <path
                        d="M13.5 2c-.178 0-.356.013-.492.022l-.074.005a1 1 0 0 0-.934.998V11a1 1 0 0 0 1 1h7.975a1 1 0 0 0 .998-.934l.005-.074A7.04 7.04 0 0 0 22 10.5 8.5 8.5 0 0 0 13.5 2Z" />
                    <path d="M11 6.025a1 1 0 0 0-1.065-.998 8.5 8.5 0 1 0 9.038 9.039A1 1 0 0 0 17.975 13H11V6.025Z" />
                </svg>
                Dashboard
            </a>
        @else
            <a href="/login" class="rounded flex items-center gap-2 p-1 px-4 bg-blue-600 text-white hover:bg-blue-500">
                <svg class="me-1 -ms-1 w-5 h-5 text-white dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2" />
                </svg>
                Sign In
            </a>
        @endif
    </div>
    <!-- Mobile menu -->
    <nav id="mobile-menu" class="hidden rounded-b-xl p-4 bg-gray-100">
        <div class="flex flex-col gap-2">
            <form>
                <div class="flex">
                    <svg class="absolute pl-2 z-10 left-4 top-[5.6rem] w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                    </svg>
                    <input type="search" id="search" name="search" class="w-full focus:ring-0 left-0 top-2 pl-8 p-1 border rounded-l" placeholder="Cari berita...">
                    <button class="bg-blue-500 hover:bg-blue-700 left-40 top-2 flex items-center p-1 px-3 rounded-r" id="search-button">
                        <svg class=" w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 1010.5 3a7.5 7.5 0 006.15 13.65z" />
                        </svg>
                    </button>
                </div>
            </form>
            <x-nav-link-mobile href='/bisnis' :active="request()->is('bisnis')">Bisnis</x-nav-link-mobile>
            <x-nav-link-mobile href='/olahraga' :active="request()->is('olahraga')">Olahraga</x-nav-link-mobile>
            <x-nav-link-mobile href='/kesehatan' :active="request()->is('kesehatan')">Kesehatan</x-nav-link-mobile>
            <x-nav-link-mobile href='/teknologi' :active="request()->is('teknologi')">Teknologi</x-nav-link-mobile>
            <x-nav-link-mobile href='/politik' :active="request()->is('politik')">Politik</x-nav-link-mobile>
            <x-nav-link-mobile href='/sains' :active="request()->is('sains')">Sains</x-nav-link-mobile>
        </div>
    </nav>
</div>
<div class="sticky top-0 hidden lg:block bg-white py-3 z-10">
    <div class="border-b-4 border-double border-current py-1">
        <nav class="flex h-6 gap-6 justify-center" aria-label="Tabs">
            <form>
                <div class="absolute left-0 top-2 flex">
                    <svg class="absolute pl-2 z-10 left-0 top-[.3rem] w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                    </svg>
                    <input type="search" id="search" name="search" class="w-40 focus:ring-0 left-0 top-2 pl-8 p-1 border rounded-l" placeholder="Cari berita...">
                    <button class="bg-blue-500 hover:bg-blue-700 left-40 top-2 flex items-center p-1 px-3 rounded-r" id="search-button">
                        <svg class=" w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M16.65 16.65A7.5 7.5 0 1010.5 3a7.5 7.5 0 006.15 13.65z" />
                        </svg>
                    </button>
                </div>
            </form>
            <x-nav-link href='/bisnis' :active="request()->is('bisnis')">Bisnis</x-nav-link>
            <x-nav-link href='/olahraga' :active="request()->is('olahraga')">Olahraga</x-nav-link>
            <x-nav-link href='/kesehatan' :active="request()->is('kesehatan')">Kesehatan</x-nav-link>
            <x-nav-link href='/teknologi' :active="request()->is('teknologi')">Teknologi</x-nav-link>
            <x-nav-link href='/politik' :active="request()->is('politik')">Politik</x-nav-link>
            <x-nav-link href='/sains' :active="request()->is('sains')">Sains</x-nav-link>
            @if (auth()->check())
                <a href="/dashboard"
                    class="bg-green-600 absolute top-2 right-0 text-white p-1 px-4 rounded hover:bg-green-500 flex items-center gap-2">
                    <svg class="me-1 -ms-1 w-5 h-5 text-white dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M13.5 2c-.178 0-.356.013-.492.022l-.074.005a1 1 0 0 0-.934.998V11a1 1 0 0 0 1 1h7.975a1 1 0 0 0 .998-.934l.005-.074A7.04 7.04 0 0 0 22 10.5 8.5 8.5 0 0 0 13.5 2Z" />
                        <path
                            d="M11 6.025a1 1 0 0 0-1.065-.998 8.5 8.5 0 1 0 9.038 9.039A1 1 0 0 0 17.975 13H11V6.025Z" />
                    </svg>
                    Dashboard
                </a>
            @else
                <a href="/login"
                    class="bg-blue-600 absolute top-2 right-0 text-white p-1 px-4 rounded hover:bg-blue-500 flex items-center gap-2">
                    <svg class="me-1 -ms-1 w-5 h-5 text-white dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2" />
                    </svg>
                    Sign In
                </a>
            @endif
        </nav>
    </div>
</div>
