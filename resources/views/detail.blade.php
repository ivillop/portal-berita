<x-layout>
    <head>
        <meta name="news-id" content="{{ $news->id }}">
    </head>
    <a class="text-blue-500 text-lg font-medium hover:underline" href="/">&laquo; Kembali ke Berita</a>
    <div class="flex flex-col gap-2 justify-center">
        <h1 class="font-medium text-2xl">{{ $news->title }}</h1>
        <div class="flex gap-2 justify-between items-center">
            <p>By {{ $news->author->name }}</p>
            <p class="bg-{{ $news->category->color }}-200 font-medium p-1 px-4 rounded text-sm">
                {{ $news->category->name }}</p>
        </div>
        <p class="text-sm text-gray-400">{{ $news->created_at->diffForHumans() }}</p>
        <div class="flex flex-col items-center">
            @if (filter_var($news->image, FILTER_VALIDATE_URL))
                <img class="rounded" src="{{ $news->image }}" alt="{{ $news->image }}">
            @else
                <img class="rounded" src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->image }}">
            @endif
        </div>
        <p class="text-justify">{{ $news->body }}</p>

        <div class="mt-6">
            <h2 class="text-lg font-medium">Berita Relevan</h2>
            <div class="flex flex-col gap-4 mt-4">
                @forelse ($relatedNews as $related)
                    <a href="/detail/{{ $related->slug }}" class="flex items-center gap-4 p-4 bg-gray-100 rounded hover:bg-gray-200">
                        @if (filter_var($related->image, FILTER_VALIDATE_URL))
                            <img class="w-16 h-16 rounded object-cover" src="{{ $related->image }}" alt="{{ $related->title }}">
                        @else
                            <img class="w-16 h-16 rounded object-cover" src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->title }}">
                        @endif
                        <div class="flex-1">
                            <h3 class="text-sm font-medium text-gray-800">{{ $related->title }}</h3>
                            <p class="text-xs text-gray-600">{{ $related->created_at->diffForHumans() }}</p>
                        </div>
                    </a>
                @empty
                    <p class="text-sm text-gray-500">Tidak ada berita relevan ditemukan.</p>
                @endforelse
            </div>
        </div>

        <div class="mt-4">
            <h2 class="text-lg font-medium">Feedback</h2>
            <form action="/detail/{{ $news->slug }}/comment" method="POST">
                @csrf
                <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                    <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                        <label for="comment" class="sr-only">Your comment</label>
                        <textarea name="comment" id="comment" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write a feedback..." required></textarea>
                    </div>
                    <div class="flex md:items-center items-start justify-between md:flex-row flex-col gap-2 px-3 py-2 border-t dark:border-gray-600">
                        <div class="flex md:items-center md:flex-row flex-col gap-2 w-full">
                            <label for="name" class="text-sm text-gray-700 dark:text-gray-300">Nama (Opsional):</label>
                            <input type="text" name="name" id="name" class=" text-sm text-gray-900 bg-white border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Anonim" />
                        </div>
                        <button type="submit" class="inline-flex justify-center w-full md:w-40 items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                            Send
                        </button>
                    </div>
                </div>
            </form>
            <div id="comments-section" class="mt-6">
                <h3 class="text-md font-medium mb-4">{{ $allComment }} Feedback</h3>
                <div id="comments-list" class="flex flex-col gap-4">
                    @foreach ($comments as $comment)
                        <div class="p-4 bg-gray-100 rounded">
                            <p class="text-sm text-gray-600">{{ $comment->name ?? 'Anonim' }}:</p>
                            <p class="text-gray-800">{{ $comment->comment }}</p>
                            <p class="text-xs text-gray-400">{{ $comment->created_at->diffForHumans() }}</p>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination links -->
                <div class="mt-4">
                    {{ $comments->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layout>
