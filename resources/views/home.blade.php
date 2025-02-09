<x-layout>
    @if (request('search'))
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4">Hasil Pencarian</h2>

            @if ($searchResults->isNotEmpty())
                <div class="grid grid-cols-1 gap-2 md:grid-cols-2 md:gap-4 lg:grid-cols-4 lg:gap-6">
                    @foreach ($searchResults as $item)
                        <div class="flex flex-col">
                            <a href="/detail/{{ $item->slug }}">
                                @if (filter_var($item->image, FILTER_VALIDATE_URL))
                                    <img class="ease-in duration-75 hover:opacity-75 w-full object-cover rounded-lg"
                                        src="{{ $item->image }}" alt="{{ $item->title }}">
                                @else
                                    <img class="ease-in duration-75 hover:opacity-75 w-full object-cover rounded-lg"
                                        src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
                                @endif
                                <h1 class="font-medium text-lg mt-2 hover:underline">{{ $item->title }}</h1>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600">Tidak ada hasil yang ditemukan.</p>
            @endif
        </div>
    @else
        <div class="mb-8">
            <h2 class="text-2xl font-bold mb-4">Berita Terbaru</h2>
            <div class="grid grid-cols-1 gap-2 md:grid-cols-2 md:gap-4 lg:grid-cols-4 lg:gap-6">
                @foreach ($latestNews as $item)
                    @if ($loop->first)
                        <div class="md:col-span-2 md:row-span-2 flex flex-col">
                            <a href="/detail/{{ $item->slug }}">
                                @if (filter_var($item->image, FILTER_VALIDATE_URL))
                                    <img class="ease-in duration-75 hover:opacity-75 w-full object-cover rounded-lg"
                                        src="{{ $item->image }}" alt="{{ $item->title }}">
                                @else
                                    <img class="ease-in duration-75 hover:opacity-75 w-full object-cover rounded-lg"
                                        src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
                                @endif
                                <h1 class="md:font-bold font-medium text-xl mt-4 hover:underline">{{ $item->title }}</h1>
                                <p class="text-gray-600 md:block hidden hover:underline">{{ Str::limit($item->body, 200) }}</p>
                            </a>
                        </div>
                    @else
                        <div class="flex flex-col">
                            <a href="/detail/{{ $item->slug }}">
                                @if (filter_var($item->image, FILTER_VALIDATE_URL))
                                    <img class="ease-in duration-75 hover:opacity-75 w-full object-cover rounded-lg"
                                        src="{{ $item->image }}" alt="{{ $item->title }}">
                                @else
                                    <img class="ease-in duration-75 hover:opacity-75 w-full object-cover rounded-lg"
                                        src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
                                @endif
                                <h1 class="font-medium text-lg mt-2 hover:underline">{{ $item->title }}</h1>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="border-t-2 mb-8">
            <h2 class="text-2xl font-bold my-4">Berita Populer</h2>
            <div class="grid grid-cols-1 gap-2 md:grid-cols-2 md:gap-4 lg:grid-cols-4 lg:gap-6">
                @foreach ($popularNews as $item)
                    <div class="flex flex-col">
                        <a href="/detail/{{ $item->slug }}">
                            @if (filter_var($item->image, FILTER_VALIDATE_URL))
                                <img class="ease-in duration-75 hover:opacity-75 w-full object-cover rounded-lg"
                                    src="{{ $item->image }}" alt="{{ $item->title }}">
                            @else
                                <img class="ease-in duration-75 hover:opacity-75 w-full object-cover rounded-lg"
                                    src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
                            @endif
                            <h1 class="font-medium text-lg mt-2 hover:underline">{{ $item->title }}</h1>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div>
            @foreach ($categories as $categoryName => $newsItems)
                <div class="border-t-2 mb-6">
                    <h3 class="my-3 text-xl font-semibold capitalize">{{ $categoryName }}</h3>
                    <div class="grid grid-cols-1 gap-2 md:grid-cols-2 md:gap-4 lg:grid-cols-4 lg:gap-6">
                        @foreach ($newsItems as $item)
                            <div class="flex flex-col">
                                <a href="/detail/{{ $item->slug }}">
                                    @if (filter_var($item->image, FILTER_VALIDATE_URL))
                                        <img class="ease-in duration-75 hover:opacity-75 w-full object-cover rounded-lg"
                                            src="{{ $item->image }}" alt="{{ $item->title }}">
                                    @else
                                        <img class="ease-in duration-75 hover:opacity-75 w-full object-cover rounded-lg"
                                            src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
                                    @endif
                                    <h1 class="font-medium text-lg mt-2 hover:underline">{{ $item->title }}</h1>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-layout>
