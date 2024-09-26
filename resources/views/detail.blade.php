<x-layout>
    <a class="text-blue-500 text-lg font-medium hover:underline" href="/">&laquo; Kembali ke Berita</a>
    <div class="lg:px-72 flex flex-col gap-2 justify-center">
        <h1 class="font-medium text-2xl">{{ $news->title }}</h1>
        <div class="flex gap-2 justify-between">
            <p>By {{ $news->author->name }}</p>
            <p class="bg-{{ $news->category->color }}-200 font-medium p-1 px-4 rounded text-sm">
                {{ $news->category->name }}</p>
        </div>
        <p class="text-sm text-gray-400">{{ $news->created_at->diffForHumans() }}</p>
        <div class="flex flex-col items-center">
            <img src="{{ $news->image }}" alt="{{ $news->image }}">
        </div>
        <p>{{ $news->body }}</p>
    </div>
</x-layout>
