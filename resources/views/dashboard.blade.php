<x-layout-dashboard>
    <x-sidebar></x-sidebar>
    <main class="md:ml-64 ml-0 bg-blue-50 p-5">
        <div>
            <h1 class="text-2xl">Selamat Datang, {{ $user->name }}!</h1>
        </div>
        <div class="flex p-4 mt-4 w-40 gap-2 bg-white rounded items-center">
            <svg class="bg-gray-100 rounded-full p-2 w-12 h-12 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v15a1 1 0 0 0 1 1h15M8 16l2.5-5.5 3 3L17.273 7 20 9.667"/>
            </svg>
            <div class="">
                <p class="text-xs">Total Berita</p>
                <p class="text-2xl font-bold">{{ $totalNews }}</p>
            </div>
        </div>
        <div class="pb-4 px-2 pt-2 flex flex-col lg:flex-row gap-2 justify-between">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mt-1">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="text" id="table-search" onkeyup="searchTable()"
                    class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-60 md:w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search">
            </div>
            <x-create-news action="/dashboard" method="POST" class="inline" :news="$news" enctype="multipart/form-data"></x-create-news>
        </div>
        <div class="mx-4 mb-4">
            {{ $news->links() }}
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">

            <table id="news-table" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="px-6 py-3">Judul</th>
                        <th class="px-6 py-3">Slug</th>
                        <th class="px-6 py-3">Gambar</th>
                        <th class="px-6 py-3">Isi</th>
                        <th class="px-6 py-3">Penulis</th>
                        <th class="px-6 py-3">Kategori</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($news as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $item->title }}</td>
                            <td class="px-6 py-4">{{ $item->slug }}</td>
                            <x-view-image-news :item="$item"></x-view-image-news>
                            <td class="px-6 py-4">{{ Str::limit($item->body, 50) }}</td>
                            <td class="px-6 py-4">{{ $item->author->name }}</td>
                            <td class="px-6 py-4">{{ $item->category->name }}</td>
                            <td class="px-6 py-4 flex flex-col items-center gap-2">
                                <x-edit-news action="/detail/{{ $item->id }}" method="POST" class="p-4 md:p-5" :item="$item" enctype="multipart/form-data" ></x-edit-news>
                                <x-delete-news action="/detail/{{ $item->id }} " method="POST" class="inline" :item="$item"></x-delete-news>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="m-4">
            {{ $news->links() }}
        </div>
    </main>
</x-layout-dashboard>
