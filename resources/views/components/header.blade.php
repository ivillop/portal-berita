<header>
    <div class="flex justify-center">
        <img class="w-72 object-cover" src="{{ asset('img/banner-logo.png') }}" alt="winnicode-logo">
        <div class="absolute top-0 left-0 hidden md:block md:pl-10 lg:pl-20 pt-5">
            <p id="current-date"></p>
            <p id="current-time"></p>
        </div>
    </div>
    <div class="sm:hidden">
        <div class="fixed right-0 w-full gap-4 bg-white py-2 bottom-0 flex justify-evenly border-t z-10">
            <x-nav-link-mobile href='/' :active="request()->is('/')">
                <x-icon-berita></x-icon-berita>
                Berita
            </x-nav-link-mobile>
            <x-nav-link-mobile href='/bisnis' :active="request()->is('bisnis')">
                <x-icon-bisnis></x-icon-bisnis>
                Bisnis
            </x-nav-link-mobile>
            <x-nav-link-mobile href='/olahraga' :active="request()->is('olahraga')">
                <x-icon-olahraga></x-icon-olahraga>
                Olahraga
            </x-nav-link-mobile>
            <x-nav-link-mobile href='/kesehatan' :active="request()->is('kesehatan')">
                <x-icon-kesehatan></x-icon-kesehatan>
                Kesehatan
            </x-nav-link-mobile>
        </div>
    </div>

</header>
<div class="sticky top-0 hidden sm:block bg-white py-3 z-10">
    <div class="border-b-4 border-double border-current py-1">
        <nav class="mb-3 flex h-6 gap-6 justify-center" aria-label="Tabs">
            <x-nav-link href='/' :active="request()->is('/')">Berita</x-nav-link>
            <x-nav-link href='/bisnis' :active="request()->is('bisnis')">Bisnis</x-nav-link>
            <x-nav-link href='/olahraga' :active="request()->is('olahraga')">Olahraga</x-nav-link>
            <x-nav-link href='/kesehatan' :active="request()->is('kesehatan')">Kesehatan </x-nav-link>
            @if(auth()->check())
                <a href="/dashboard" class="bg-green-600 absolute right-0 text-white p-1 px-4 rounded hover:bg-green-500 flex items-center gap-2">
                    <svg class="me-1 -ms-1 w-5 h-5 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13.5 2c-.178 0-.356.013-.492.022l-.074.005a1 1 0 0 0-.934.998V11a1 1 0 0 0 1 1h7.975a1 1 0 0 0 .998-.934l.005-.074A7.04 7.04 0 0 0 22 10.5 8.5 8.5 0 0 0 13.5 2Z"/>
                        <path d="M11 6.025a1 1 0 0 0-1.065-.998 8.5 8.5 0 1 0 9.038 9.039A1 1 0 0 0 17.975 13H11V6.025Z"/>
                      </svg>
                    Dashboard
                </a>
            @else
                <a href="/login" class="bg-blue-600 absolute right-0 text-white p-1 px-4 rounded hover:bg-blue-500 flex items-center gap-2">
                    <svg class="me-1 -ms-1 w-5 h-5 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2"/>
                      </svg>
                    Sign In
                </a>
            @endif
        </nav>
    </div>
</div>
