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
    <div class="border-b border-current py-1">
        <nav class="mb-3 flex h-6 gap-6 justify-center" aria-label="Tabs">
            <x-nav-link href='/' :active="request()->is('/')">Berita</x-nav-link>
            <x-nav-link href='/bisnis' :active="request()->is('bisnis')">Bisnis</x-nav-link>
            <x-nav-link href='/olahraga' :active="request()->is('olahraga')">Olahraga</x-nav-link>
            <x-nav-link href='/kesehatan' :active="request()->is('kesehatan')">Kesehatan </x-nav-link>
            <a href="/login" class="bg-blue-600 absolute right-0 text-white p-1 px-4 rounded active:bg-blue-500">Login
            </a>
        </nav>
        <div class="border-t border-current"></div>
    </div>
</div>
