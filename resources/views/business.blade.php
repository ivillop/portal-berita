<x-layout>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 lg:grid-cols-4 lg:gap-8">
        @foreach ($news as $item)
            <div class="flex flex-col">
                <a href="/detail/{{ $item->slug }}">
                    <h1 class="font-medium text-lg hover:underline">{{ $item->title }}</h1>
                    <img class="ease-in duration-75 hover:opacity-30 w-full" src="{{ $item->image }}"
                        alt="{{ $item->image }}">
                </a>
            </div>
        @endforeach
    </div>
</x-layout>
