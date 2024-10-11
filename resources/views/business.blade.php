<x-layout>
    <div class="grid grid-cols-1 gap-2 md:grid-cols-2 md:gap-4 lg:grid-cols-4 lg:gap-6">
        @foreach ($news as $item)
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
</x-layout>
